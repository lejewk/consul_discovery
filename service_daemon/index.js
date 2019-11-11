const express = require('express')
const redis = require('redis')

const app = express()
const client = redis.createClient({
  host: 'redis-server',
  port: 6379
})

//defining the root endpoint
app.get('/', (req, res) => {
  client.get('data_source/postgresql_ec_daemon_master/host', (err, value) => {
      res.send('Daemon client connect to database host: ' + value)
  })
})

//specifying the listening port
app.listen(8080, ()=>{
  console.log('Listening on port 8080')
})