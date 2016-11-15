#!/usr/bin/php
<?php
	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');

		function requestProcessor($request)
		{
			echo "received request".PHP_EOL;
  			var_dump($request);
  			if(!isset($request['type']))
  			{
    			  return "ERROR: unsupported message type";
  			}
  			switch ($request['type'])
  			{
    				case "NJIT":
      				  return NJIT($request['Majors']);
    				case "Rutgers":
      				  return Rutgers($request['Majors']);
    				case "Colleges":
      				  return Colleges();
  			}
  			return array("returnCode" => '0', 'message'=>"Server received request and processed");
		}
		function NJIT($Majors) {
			$con=mysqli_connect ("localhost", "Matt","ms629","it490");
			$sql="select * from NJIT where Majors = '$Majors'";
			$result=mysqli_query($con,$sql);
			return $response;
 		}
		function Rutgers($Majors){
        		$con=mysqli_connect ("localhost", "Matt","ms629","it490");
        		$sql="select * from RutgersNewark where Majors = '$Majors'";
        		$result=mysqli_query($con,$sql);
        		return $response;
 		}
		function Colleges(){
			
		        $con=mysqli_connect ("localhost", "Matt","ms629","it490");
		        $sql="select * from CollegeList";
        		$result=mysqli_query($con,$sql);
			$count=mysqli_num_rows($result);
			if($count>0){
			$sql="select * from CollegeList";
			$result=mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($result));
				{
				$response = array($row);
				}
			echo $response;
			return $response;	
 		      }
		}
	$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
	$server->process_requests('requestProcessor');
	exit();
?>

