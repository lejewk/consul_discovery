# 개요
consul kv 와 비즈니스 활용 예시 입니다.

# 구성
|service name|description|
|---|---|
|redis_service|key/value 저장|
|configuration|consul server 실행|
|config_manager|kv 를 수동 갱신|
|consul_daemon|key 감시 & 해당 key/value 를 redis 에 저장|
|consul_fileupload|``|
|service_daemon|redis 에 저장된 key를 조회하여 출력|
|service_fileupload|``|

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

# put kv
``` bash
# config_manager 컨테이너 접근
docker exec -it config_manager bash

# consul kv
consul kv put data_source/postgresql_daemon/host daemon-master
consul kv put data_source/redis/host redis-master
```

# 서비스 확인
http://localhost:8081/
http://localhost:8082/
