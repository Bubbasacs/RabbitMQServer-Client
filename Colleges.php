<?php
	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	$request = array();
	$request['type'] = "Colleges";
	$request['Colleges'] = $_Post["Colleges"];
	$response = $client->send_request($request);
?>
