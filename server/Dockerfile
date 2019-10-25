FROM centos

RUN yum -y update
RUN yum install wget unzip vim -y
RUN wget https://releases.hashicorp.com/consul/1.6.1/consul_1.6.1_linux_amd64.zip -P /usr/local/bin
RUN unzip /usr/local/bin/consul_1.6.1_linux_amd64.zip -d /usr/local/bin \
  && rm /usr/local/bin/consul_1.6.1_linux_amd64.zip
RUN mkdir -p /etc/consul.d
ADD /add /etc/consul.d

EXPOSE 8300 8301 8302 8400 8500 8600

# -client", "0.0.0.0 로 작성해야 외부 접근이 가능함.
CMD ["consul", "agent", "-dev", "-enable-script-checks", "-client", "0.0.0.0", "-config-dir=/etc/consul.d/"]