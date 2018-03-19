<?php 
	$connections = mysqli_connect("localhost", "root", "", "book");
	if(mysqli_connect_errno())
	{
		echo "Can't connect to database. " . mysqli_connect_error();
	}
?>