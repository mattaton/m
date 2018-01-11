<!DOCTYPE html>
<html>
<head>
	<title>PHP Arrays</title>
</head>
<body>
	<?php
		//*arrays in php*
		//index can be numeric
		//elements may have different data types
		
		//*declaring an array using the array() function
		$colors = array("black", "white" , "red");
		
		
		// *declaring an array using the array operator []
		$colors[] = "black";
		$colors[] = "white";
		$colors[] = "red";
		
		// *displaying/accessing an element of an array
		echo $colors[5] . "<br/>";
		
		$num[5] = 5;
		$num[2] = 3;
		$num[] = 10;
		$num[] = 12;
		
		echo $num[2];
		
		//*associative arrays*
		
		$character = array(
			"name" => "Bob", 
			"occupation" => "Superhero",
			"age" => 40,
			"superpower" => "x-ray vision"
		);
		$character["weapon"] = "Sword";
		
		echo $character["age"]
		
		//(Won't work)
		for($i=0; $i<4;$i++){ 
			echo $character[$i];
		}
		
		foreach($character as $val){
				echo "$val<br>";
		}
		
		//*multidimentional arrays*
		
		$character = array(
			array(
				"name" => "Bob", 
				"occupation" => "Superhero",
				"age" => 40,
				"superpower" => "x-ray vision",
				"weapon" => "sword"
			),
			array(
				"name" => "Sally", 
				"occupation" => "Superhero",
				"age" => 25,
				"superpower" => "Super strength"
			),
			array(
				"name" => "Jane", 
				"occupation" => "Arch Villain",
				"age" => 32,
				"superpower" => "Nanotechnology"
			)
		);
		
		foreach($character as $c){
			foreach($c as $val){
				echo "$val<br>";
			}
		}
		
		for($i=0; $i<3;$i++){
			foreach($character [$i] as $val){
				echo "$val<br>";
			}
		}
		
		foreach ($character as $c){
			while (list($key, $val) = each($c)){
				echo "$key: $val<br>";
			}
			echo "<hr>";
		}
	?>
</body>
</html>