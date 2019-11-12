FROM centos_redis_consul

RUN mkdir -p /etc/consul.d
ADD /add /

CMD consul agent \
  -enable-script-checks \
  -config-dir=/etc/consul.d/ \
  -retry-join=configuration