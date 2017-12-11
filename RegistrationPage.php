<!DOCTYPE html>
<html>
<head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Pseudo-Registration Page</title>
</head>
<body>
	<nav>
    	<div class="nav-wrapper">
      		<a  class=" brand-logo center">Registration Page</a>
      		<ul id="nav-mobile" class="left hide-on-med-and-down">
        		<li><a href="StartPage.html">Home</a></li>
    	</div>
  	</nav>


<?php

		function displayRegistration(){

		
			if(isset($_POST["submit"])){
			$gender = $_POST["gender"];
			$status = $_POST["status"];
			}

			$name = $_POST["name"];
			$birthdate = $_POST["birthdate"];
			$nationality = $_POST["nationality"];
			$status = $_POST["status"];
			$religion = $_POST["religion"];
			$address = $_POST["address"];
			$telephone = $_POST["telephone"];
			$email = $_POST["email"];
			$education = $_POST["education"];	

			if (empty($name) || empty($birthdate) || empty($nationality) || empty($status) || empty($religion) || empty($address) || empty($telephone) || empty($email) || empty($education)) {
			echo("<center><h1> Missing Information! </h1></center>");
			}
			else {

			echo "<center><p>Welcome, $name here are your details:</p></center>";
			echo "<center><p>Birth Date: $birthdate</p></center>";
			echo "<center><p>Gender: $gender</p></center>";
			echo "<center><p>Nationality: $nationality</p></center>";
			echo "<center><p>Civil Status: $status</p></center>";
			echo "<center><p>Religion : $religion</p></center>";
			echo "<center><p>Address: $address</p></center>";
			echo "<center><p>Telephone: $telephone</p></center>";
			echo "<center><p>E-Mail Address: $email</p></center>";
			echo "<center><p>Highest Educational Attainment: $education</p></center>";
		}
	}
		if(array_key_exists('submit',$_POST)){
		displayRegistration();
		}
		
	?>







<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>