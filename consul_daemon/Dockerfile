FROM centos

# yum install
RUN yum -y update
RUN yum install wget unzip vim make -y

# consul & redis down
RUN wget https://releases.hashicorp.com/consul/1.6.1/consul_1.6.1_linux_amd64.zip -P /tmp
RUN wget http://download.redis.io/redis-stable.tar.gz -P /tmp

# decompress
RUN unzip /tmp/consul_1.6.1_linux_amd64.zip -d /usr/local/bin
RUN tar xvzf /tmp/redis-stable.tar.gz -C /tmp

# make redis-cli
RUN cd /tmp/redis-stable
RUN make
RUN cp /tmp/redis-stable/src/redis-cli /usr/local/bin

RUN mkdir -p /etc/consul.d
ADD /add /etc/consul.d

CMD consul agent \
  -enable-script-checks \
  -config-dir=/etc/consul.d/ \
  -retry-join=configuration