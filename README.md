# 구성


# docker-compose
``` bash
# 실행
docker-compose up -d

# 중지
docker-compose down
```

# consul curl
``` bash
# 전체 노드 보기
curl localhost:8500/v1/catalog/nodes
# 전체 맴버 보기
curl localhost:8500/v1/agent/members
```

# test command
``` bash
# server
docker stop consul-server
docker rm $(docker ps -a -q)
docker build --rm -t consul-server:latest ./server
docker run --name consul-server -d -p 8300:8300 -p 8301:8301 -p 8302:8302 -p 8400:8400 -p 8500:8500 -p 8600:8600 consul-server

docker exec -it consul-server bash

# client
docker stop consul-client
docker rm $(docker ps -a -q)
docker build --rm -t consul-client:latest ./client
docker run --name consul-client -d consul-client

docker exec -it consul-client bash

consul agent -dev -enable-script-checks -config-dir=/etc/consul.d/
```