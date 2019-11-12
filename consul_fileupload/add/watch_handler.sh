#!/bin/bash

host=`consul kv get data_source/redis/host`
redis-cli -h redis-server set data_source/redis/host $host