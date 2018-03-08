<!DOCTYPE html>
<html>
		<head>
				<title>Student Information</title>
				<meta charset="utf-8">
		</head>
		<style>
		p {
    font-size: 27px;
		}
    .button {
      background-color: #f4dc42;
      border: 2px solid #6d6731;
      color: white;
      padding: 15px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
  }
  input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
		</style>
		<body>
			<center>
        <form  method="post">
        <p>Student Information</p>
				<input class="text" placeholder="Last Name" type="text" name="searchln"> 
				<input class="button" type="submit" value="Search Records" name="search"> 
        <input class="text" placeholder="Student Number" type="text" name="studNo"> <br/>
				<input class="text" placeholder="Last Name" type="text" name="lastName"><br/>
				<input class="text" placeholder="First Name" type="text" name="firstName"><br/>
				<input class="text" placeholder="Program" type="text" name="program"><br/><br/>
				
        <input class="button" type="submit" value="Add Student" name="add">
				<input class="button" type="submit" value="Display" name="display">
      </form><br/>

<?php
	$id=0;
	function addStudent(){
		include("connection.php");
		$sn = $_POST['studNo'];
		$ln = $_POST['lastName'];
		$fn = $_POST['firstName'];
		$pr = $_POST['program'];
		
		$sql = "INSERT INTO student VALUES ($sn,'$ln','$fn','$pr')";
		$res = mysqli_query($mysqli, $sql);
		
		if($res === TRUE){
			echo "<br><h2>Student Added.</h2>";
		}
		else{
			echo "<br><h2>Failed to insert record.</h2>";
		}
	}
	
	if(array_key_exists('add',$_POST)){
		addStudent();
	}
	
	function displayRecords(){
		include("connection.php");
		$sql = "SELECT * FROM student";
		$res = mysqli_query($mysqli,$sql);
		
		echo "<table style=\"border: 1px solid black;\">";
		echo"<tr>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "Student Number";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "Last Name";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "First Name";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "program";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "actions";
			echo "</td>";
		echo"</tr>";
		
		while($data = mysqli_fetch_array($res, MYSQLI_ASSOC)){
			echo"<tr>";
			global $id;
			$id = $data['StudentNumber'];
			foreach($data AS $val){
				echo "<td style=\"border: 1px solid black;\">";
				echo $val;
				echo "</td>";
			}
			echo "<form method=\"post\" action=\"edit.php\">";
			echo "<td style=\"border: 1px solid black;\">";
			echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
			echo "<input class=\"button\" type=\"submit\" name=\"Edit\" value=\"Edit\">";
			echo "</form>";
			echo "<form method =\"post\">";
			echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
			echo "<input class=\"button\" type=\"submit\" name=\"Delete\" value=\"Delete\">";
			echo "</td>";
			echo "</form>";
			echo "</tr>";
		}
		echo "</table>";
	}
	if(array_key_exists('display',$_POST)){
		displayRecords();
	}
	
	
	function searchRecords(){
	include("connection.php");
		$sr = $_POST['searchln'];
		$sql = "SELECT * FROM student WHERE LastName LIKE '%$sr%'";
		$res = mysqli_query($mysqli,$sql);
		
		echo "<table style=\"border: 1px solid black;\">";
		echo"<tr>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "Student Number";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "Last Name";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "First Name";
			echo "</td>";
			echo "<td style=\"border: 1px solid black;\">";
			echo "program";
			echo "</td>";
		echo"</tr>";
		
		while($data = mysqli_fetch_array($res, MYSQLI_ASSOC)){
			echo"<tr>";
			foreach($data AS $val){
				echo "<td style=\"border: 1px solid black;\">";
				echo $val;
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	if(array_key_exists('search', $_POST)){
		searchRecords();
	}
	
	if(array_key_exists('Delete',$_POST)){
		deleteRecord();
	}
	
	function deleteRecord(){
	include("connection.php");
	$sn = $_POST['id'];
	$sql = "DELETE FROM student WHERE StudentNumber = $sn";
	echo $sql;
	$res = mysqli_query($mysqli, $sql);
	if($res){
		echo "Record Deleted.";
		displayRecords();
	}
	}

?>