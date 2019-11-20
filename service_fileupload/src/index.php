<?php
require __DIR__ . '/vendor/autoload.php';
require_once "DataSource.php";

$ds = dataSource();
if (empty($ds) === false) {
  $ds = json_decode($ds);
}

echo "<pre>";
var_dump($ds);