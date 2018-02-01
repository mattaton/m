<!DOCTYPE html>
<html>
<head>
	<title>PHP String Functions</title>
</head>
<body>
	<?php
	//type specifiers
	//% is a placeholder
	//uc=uppercase ; lc=lowercase
		printf("Decimal: %d <br>", 123.456);
		printf("Binary: %b <br>" , 123.456);
		printf("Double: %f <br>", 123.456);
		printf("String: %s <br>", 123.456);
		printf("Octal: %o <br>", 123.456);
		printf("Dex (lc): %x <br>", 123.456);
		printf("Hex (uc): %X <br>", 123.456);
		
		//%d removes decimal numbers after the period
		
		$num1 = 5;
		$num2 = 3;
		printf(" The first number is %d. The second number is %d. <br>", $num1, $num2);
		
		$red = 255;
		$green = 50;
		$blue = 100;
		printf("#%X%X%X <br>", $red, $green , $blue, 1);
		
		//padding specifiers
		echo "<pre>";
		printf("%05d <br>", 9999);
		printf("%'x5d <br>", 999);
		printf("%' 20d <br>", 12345);
		echo "</pre>";
		
		//field with specifiersecho 
		echo "<pre>";
		printf("%20s\n", "Laptop");
		printf("%20s\n", "Keyboard");
		printf("%20s\n", "Monitor");
		printf("%20s\n", "Mouse");
		printf("%20s\n", "Charger");	
		
		printf("%-20s%15s\n<br>", "Item", "Price");
		printf("%-20s%15f\n", "Laptop", 50000);
		printf("%-20s%15f\n", "Keyboard", 25000);
		printf("%-20s%15f\n", "Monitor", 15000);
		printf("%-20s%15f\n", "Mouse", 1250.50);
		printf("%-20s%15f\n", "Charger", 350.75);	
		echo "</pre>";
		
		//precision specifiers
		printf("%.2f", 123.456);
		
		echo "<pre>";
		printf("%-20s%15s\n<br>", "Item", "Price");
		printf("%-20s%15.2f\n", "Laptop", 50000);
		printf("%-20s%15.2f\n", "Keyboard", 25000);
		printf("%-20s%15.2f\n", "Monitor", 15000);
		printf("%-20s%15.2f\n", "Mouse", 1250.50);
		printf("%-20s%15.2f\n", "Charger", 350.75);	
		echo "</pre>";
		
		$products = array(
			"Laptop" => 50000,
			"keyboard" => 25000,
			"Monitor" => 15000,
			"Mouse" => 1250.50,
			"Charger" => 350.75
		);
		
		//using array
		echo "<pre>";
		printf("%-20s%15s\n<br>", "Item", "Price");
		printf("%'35s\n", "");
		foreach($products as $key=>$val){
			printf("%-20s%15.2f\n", $key, $val);
		}
		echo "</pre>";
		
		//sprintf
		$hex = sprintf("#%X%X%X <br>", $red, $green , $blue, 1);
		echo $hex;
		
		$message = "Hello";
		echo $message[0] . "<br>";
		echo $message[3] . "<br>";
		
		//strlen
		//gets the number of characters in a string
		// backslash n is considered as 1 character
		echo strlen($message) . "<br>";
		$path = "c:\new folder\reviewers";
		echo strlen($path) . "<br>";
		
		$password = "abcd";
		if (strlen($password) < 8){
				echo "Password is too short.<br>";
		}
		else{
			echo " Password has been changed.<br>";
		}
		
		//strstr
		//checks if a string is found within another string
		$password = "Matt123";
		$name = "Matt";
		if (strstr($password, $name)){
			echo "Your password must not contain your name.<br>";
		}
		else{
			echo "Your password has been saved.<br>";
		}
		
		//strpos
		//return boolean False if not found
		//return integer index if found
		
		$message = "Hello";
		$pos = strpos($message, "e");
		
		if ($pos >= 0 && gettype($pos) == "integer"){
		echo " The character was found at index " . $pos;
		}
		else{
			echo "The character was not found.<br>";
		}
		
		echo "<br>";
		
		//substr
		//extracts part of a string based on a start index and number of characters
		
		$message = "Hello";
		echo substr($message, 1, 3) . "<br>";
		echo substr($message, 0, 2) . "<br>";
		echo substr($message, -3, 2) . "<br>";
		
		//trim ltrim rtrim
		//removes leading and/or trailing spaces
		$message = "           the         quick       brown     fox   ";
		echo "<pre>" . trim($message . "</pre>");
		echo "<pre>" . ($message . "</pre>");
		
		//strip_tags
		//removes html tags from a text
		
		$message = "<em>Hello</em> wo<strong style =\"color: red\">r</strong>ld";
		echo $message. "<br>";
		echo strip_tags($message, "<em><br>") . "<br>";
		
		//str_replace
		//replaces all instances of a given string within another string
		
		$message = "Hello, Good morning, Have you given the box to him?";
		$filter = array (
			"Hell" => "****",
			"hi" => "**",
			"x" => "*",
			"good" => "****"
			);
		// echo str_replace("l", "r", $message)
		// echo str_replace($filter, "****", $message);
		foreach($filter as $word => $mask){
			$message = str_replace($word, $mask , $message);
		}
		echo $message . "<br>";
		
		$message = "   This  text    has    spaces     ";
		$message = trim($message);
		echo $message;
		while(strstr($message, "  ")){
			$message = str_replace("  ", " ", $message);
		}
		echo "<pre>". $message .  "</pre><br>";
		
		
	?>
	
</body>
</html>