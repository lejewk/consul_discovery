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
docker run --name consul-server -d -p 8500:8500 consul-server

docker exec -it consul-server bash

# client
docker stop consul-client
docker rm $(docker ps -a -q)
docker build --rm -t consul-client:latest ./client
docker run --name consul-client -d consul-client

docker exec -it consul-client bash
docker run --rm -it consul-client bash
```