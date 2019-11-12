FROM centos_redis-cli_consul

RUN mkdir -p /etc/consul.d
ADD /add /etc/consul.d
RUN chmod 755 /etc/consul.d/watch_handler.sh

CMD consul agent \
  -enable-script-checks \
  -config-dir=/etc/consul.d/ \
  -retry-join=configuration