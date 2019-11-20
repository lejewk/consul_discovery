<?php

function dataSource() {
  $key = 'data_source';
  $redis = new Redis();
  $redis->connect('redis-server', 6379);
  $value = $redis->get($key);

  if (empty($value) === false) {
    return $value;
  }
  
  $client = new \GuzzleHttp\Client();
  $config = new \DCarbone\PHPConsulAPI\Config([
    'HttpClient' => $client,
    'Address' => 'consul_agent:8500'
  ]);

  $consul = new \DCarbone\PHPConsulAPI\Consul($config);

  list($value, $qm, $err) = $consul->KV->get($key);
  if ($err !== null) {
    die($err);
  }

  if (empty($value->Value) === false) {
    $redis->set($key, $value->Value);
  }

  $redis->close();

  return $value;
}