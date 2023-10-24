<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$channel = 'news_channel';
echo "Subscriber waiting for messages...\n";

$redis->subscribe([$channel], function ($redis, $channel, $message) {
    echo "Received: $message from $channel\n";
});

// Enter a loop to keep the subscriber running
while (true) {
    $redis->ping();
    usleep(200000); // Sleep for a short interval to avoid a busy loop
}
