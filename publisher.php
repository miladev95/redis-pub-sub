<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$channel = 'news_channel';
$message = 'This is a new message!';
$redis->publish($channel, $message);

$redis->close();
