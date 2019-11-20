# 개요
consul kv 와 비즈니스 활용 예시 입니다.

# 구성
|service name|description|
|---|---|
|redis_service|data_source json 저장|
|configuration|consul server 실행|
|config_manager|kv 를 수동 갱신|
|consul_agent|data_source 감시 & data_source json 을 redis 에 저장|
|service_fileupload|data_source 출력|

# 준비
centos_redis_consul 이미지가 필요합니다.
``` bash
# build script
docker build -f ./centos_redis_consul/Dockerfile -t centos_redis_consul:latest .
```

# docker-compose
``` bash
# 실행
docker-compose up -d

# 중지
docker-compose down
```

# 노드 확인
http://localhost:8500/v1/catalog/nodes

# UI
http://localhost:8500/ui

# put kv
``` bash
# config_manager 컨테이너 접근
docker exec -it config_manager bash

# consul kv
consul kv put data_source '{"postgresql_mall_master":{"type":"pgsql","host":"/tmp","port":9999,"database":"shopdb","username":"wookuser","password":"abcdefg"},"postgresql_coupon_master":{"type":"pgsql","host":"/tmp","port":9999,"database":"coupon","username":"bigc","password":"supec"},"memcached":{"host":"localhost","port":11211},"redis":{"host":"redis-serfvice","port":11211}}'

# consul kv change, postgresql_mall_master.host = localhost
consul kv put data_source '{"postgresql_mall_master":{"type":"pgsql","host":"localhost","port":9999,"database":"shopdb","username":"wookuser","password":"abcdefg"},"postgresql_coupon_master":{"type":"pgsql","host":"/tmp","port":9999,"database":"coupon","username":"bigc","password":"supec"},"memcached":{"host":"localhost","port":11211},"redis":{"host":"redis-serfvice","port":11211}}'
```

# 서비스 확인
http://localhost:8082/
