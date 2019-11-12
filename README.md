# 개요
consul kv 와 비즈니스 활용 예시 입니다.

# 구성
<iframe frameborder="0" style="width:100%;height:477px;" src="https://www.draw.io/?lightbox=1&highlight=0000ff&edit=_blank&layers=1&nav=1#R7Vttc%2BMmEP41%2FugMIFtSPiaOc51ebnoz7rSX%2B5LBEra4Q8JF%2BK2%2FvsgCSzJKaqd%2BIVPbM7FYQIh9dp9dBOl4g3T1SeBZ8oXHhHUQiFcd76GD1Mfrq59CstYS0AtKyVTQuJTBSjCifxMtBFo6pzHJGw0l50zSWVMY8SwjkWzIsBB82Ww24aw56gxPiSUYRZjZ0j9pLJNSGqKgkv9C6DQxI0P%2FtqxJsWmsZ5InOObLmsgbdryB4FyWV%2BlqQFihPaOXst%2FjK7XbBxMkk%2Ft0iPkP%2FBkOn%2F6g35eff%2F1t%2Bftfy29dT99mgdlcz3jG4%2B6EMjKfMY7jbk7EgkZEz0GujWISmTJ1BTve%2FTKhkoxmOCqqlsoQlCziKY10fS4F%2F7lVXyGZ8Ew%2B4pSywiwGm6YIjHCWq58vI91gpAcrOsQ4T0isCwyPCfvKcyopz5QsUhogQlUsiJBUYfe002DMpeSpaoAZnbb2uNMVks%2FM6KUpep4q26o2alPdyaom0qr%2FRHhKpFirJrq2Z%2BxeOwLsa7NYVlblhVqW1CwKGSHWljzd3rsCW11ovA%2FBHrRiH2OS8uyK%2B3Fw70LDZO4Af2vjPpdK8FPdbWEBTmJFiLrIhUz4lGeYDSvpveDzLN6gBFSpavPEC61uoPtBpFxr1eK55EpUMySyovJb0f2mr0vPtZqHlb7zprA2hUypotapKD7X66pum5LpV8MYActI0Vuo53wuIvKGYk2AwmJK5BvtUNmu0OybNiQIw5IumqHo6OZghwAVTCd0%2BpLiTIU3cTwKQIdSQBtgKjaxAWdcbB7G8wG%2BhcF2qFoNegh8YO5Qk082n%2BO4Nwqa3t1Fvu3eMGhx7%2F6pvBu1wZnP2UvB6K6jCccYEtSGJgD%2B8O7xzGhuyftiaELbO5dYRskladpcPzco%2B19pGjV4Gl6Qp70PydPINgUp6LSNoc8Zs99jDLBuCbUA%2FoottPNO3TrOYAvAKWPwXmH5K72%2FTu8QNendQ32L3dsy8dORux2rL07u7%2FJncBM4Q%2B69D0nu0HeR3N8X6Q8jdxdsAXpOGUPvSu4Hk3sfOkbufQtEQWKau43hBGAP4DYM7x8CcLLVtNkdaFk8I3DWiBxaqBXM8dEo%2BMD8%2BpQU7O9JwX2nGBjZ70gZjzBLeK4mcReCEF7SKJovSsGbRnHKxdO%2B4KLQKXTtXEvvdryUmx9uc3TcJ2Hca%2BPoEI093z8OF8NbO36emYsD17j4fWsjd7g42DcddutdB7JTqR0yRlcy3h9d5B8bXd31K6eZrDJyfycj393PLB9Ud9oxke1TvN9qbPYwJF%2BdbvhfE%2F0rCycHiN8%2BmHBdOh2IogNLKZu18wuH7wOI2sWlFNx3r8Kx%2BA3tzYo82fRz2Z%2FVUiCcRG3%2B7EchGR%2FJbwPXXlshe0%2FiI7rtgVn3KfMys%2Bv00V6B2FH46rXmVF%2FomtfarzQsnGZFpk3EcKHmnRtAzKHkQpXbw5ag6YhNVWY8I7be%2B6D4dv7LIc32M5l8LhnN1OjmfHcxiHWeU81jVkwzXU2Lg%2Bg3fDJRmf7NXKX8%2BebvkbKsMLBw7vnnxNl%2BP33F%2Bfg4ByeDWRWrI%2F%2FlUrf6zwlv%2BA8%3D"></iframe>

|service name|description|
|---|---|
|redis|key/value 저장|
|configuration|consul server 실행|
|config_manager|kv 를 수동 갱신|
|consul|key 감시 & 해당 key/value 를 redis 에 저장|
|service_daemon|redis 에 저장된 key를 조회하여 출력|

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
