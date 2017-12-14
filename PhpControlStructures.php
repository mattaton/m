<!DOCTYPE html>
<html>
<head>
	<title>PHP Control Structures</title>
</head>
<body>

	<?php
	// (== 0 = "0" checks if they have the same value,=== checks value and data type)
	// false is equivalent to 0, other numbers is true
		// $x = false;
		// if ($x == "0"){
			// echo "True";
		// }
		// else {
			// echo "False";
		// }
	
		// $x = 5;
		// if ($x > 0 && $x < 10){
			// echo "1 to 9";
		// }
		// elseif ($x > 10 && $x < 20){
			// echo "11 to 19";
		// }
		// else {
			// echo "other numbers";
		// }
		
		// preceedence (not !,and && ,or ||)
		// symbols are higher than words
		// (&&, ||, and, or)
		// $a = 4;
		// $b = 5;
		// if ($a == 4 || $b == 5 && $a == $b) {
			// echo "True";
		// }
		// else {
			// echo "False";
		// }
		
		
		// xor- if both are true and false, answer is false; if one is true, answer is true
		// $a = 4;
		// $b = 5;
		// if ($a == 4 xor $b == 5){
			// echo "True";
		// }
		// else {
			// echo "False";
		// }
		
		// switch
		// $a = 1;
		// switch ($a){
			// case 1:
				// echo "One";
				// break;
			// case 2:
				// echo "Two";
				// break;
			// default:
				// echo "Others";	
		// {
					
		// $letter = "a";
		// switch ($letter){
			// case "a":
			// case "e":
			// case "i":
			// case "o":
			// case "u":
				// echo "vowel";
				// break;
			// case "b":
			// case "c":
				// echo "consonant";
				// break;		
		// }
		
		// $a = 5;
		// switch ($a % 2){
			// case 1:
				// echo "Odd";
				// break;
			// case 2:
				// echo "Even";
				// break;
		// }
		
		// $a = 5;
		// switch ($a > 0){
			// case true:
				// echo "True";
				// break;
			// case false:
				// echo "False";
				// break;
		// }
		
		// echo "<table style=\"border: 1px solid black;\">";
		// for ($x=1; $x<10; $x++){
			// echo "<tr>";
			// for ($y = 1; $y < 10; $y++){
				// echo "<td style=\"border: 1px solid black; width: 30px; text-align: center;\">";
				// echo ($x * $y);
				// echo "</td>";
			// }
			// echo "</tr>";
		// }
		// echo "</table>";
		
		?>

</body>
</html>