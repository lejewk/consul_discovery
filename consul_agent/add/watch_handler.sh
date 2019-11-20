#!/bin/bash

data_source=`consul kv get data_source`
redis-cli -h redis-server set data_source $data_source