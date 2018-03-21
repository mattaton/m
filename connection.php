
<?php
$mysqli = mysqli_connect("localhost", "testuser", "cwp112", "tstdb");
	
	//mysqli_connect("host name", "user", "pass", "database")
	
	if(mysqli_connect_error()){
		printf("<h2>Connection Failed: %s\n <br></h2>", mysqli_connect_error());
		exit();
	}
	else{
	printf("<h2>Connection Info: %s\n <br></h2>", mysqli_get_host_info($mysqli));
	}
?>