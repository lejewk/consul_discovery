FROM centos

# yum install
RUN yum -y update
RUN yum install wget unzip vim redis -y

# install consul
RUN wget https://releases.hashicorp.com/consul/1.6.1/consul_1.6.1_linux_amd64.zip -P /tmp
RUN unzip /tmp/consul_1.6.1_linux_amd64.zip -d /usr/local/bin