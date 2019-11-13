FROM centos_redis_consul

RUN mkdir -p /etc/consul.d
RUN mkdir -p /var/consul
ADD /add /etc/consul.d

EXPOSE 8300 8301 8302 8400 8500 8600

CMD consul agent -enable-script-checks -config-dir=/etc/consul.d/