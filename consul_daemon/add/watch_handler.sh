#!/bin/bash

host=`consul kv get data_source/postgresql_daemon/host`
redis-cli -h redis-server set data_source/postgresql_daemon/host $host