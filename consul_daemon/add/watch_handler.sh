#!/bin/bash

host=`consul kv get data_source/postgresql_ec_daemon_master/host`
redis-cli -h redis-server set data_source/postgresql_ec_daemon_master/host $host