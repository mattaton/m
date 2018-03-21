
<?php
$mysqli = mysqli_connect("localhost", "id5140742_testuser", "cwp112", "tstdb");
	
	//mysqli_connect("host name", "id5140742_testuser", "cwp112", "database")
	
	if(mysqli_connect_error()){
		printf("<h2>Connection Failed: %s\n <br></h2>", mysqli_connect_error());
		exit();
	}
	else{
	printf("<h2>Connection Info: %s\n <br></h2>", mysqli_get_host_info($mysqli));
	}
?>