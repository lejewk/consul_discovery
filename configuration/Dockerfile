FROM centos_redis-cli_consul

RUN mkdir -p /etc/consul.d
ADD /add /etc/consul.d

EXPOSE 8300 8301 8302 8400 8500 8600

CMD consul agent \
  -dev \
  -ui \
  -enable-script-checks \
  -config-dir=/etc/consul.d/ \
  -bind=0.0.0.0 \
  -client=0.0.0.0