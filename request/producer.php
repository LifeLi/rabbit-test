<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$string = 'Hello World!';
$msg = new AMQPMessage($string);
$channel->basic_publish($msg, '', 'hello');

$channel->close();
$connection->close();

echo '<pre>';
//print_r($channel);
echo '</pre>';