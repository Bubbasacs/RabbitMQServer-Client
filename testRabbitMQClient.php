#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$Colleges = null;
$request = array();
$request['type'] = 'Colleges';
$response = $client->send_request($request);
	$length = count($response);
	for($i = 0; $i < $length; $i++)
	{
		echo $response[$i].PHP_EOL;
	}
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
?>
