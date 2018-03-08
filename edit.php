<!DOCTYPE html>
<html>
		<head>
			<?php
			 if (isset($_POST['id'])){
				include("connection.php");
				$sn = $_POST['id'];
				$sql = "SELECT * FROM student WHERE StudentNumber = $sn";
				$res = mysqli_query($mysqli, $sql);
				$data = mysqli_fetch_array($res, MYSQLI_ASSOC);
				
				$ln = $data['LastName'];
				$fn = $data['FirstName'];
				$pr = $data['Program'];
			 }
			?>
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
      font-size: 16px;
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
        <input class="text" placeholder="Student Number" type="text" name="studNo" value ="<?php global $sn; echo $sn; ?>" readonly> <br/>
				<input class="text" placeholder="Last Name" type="text" name="lastName" value ="<?php global $ln; echo $ln; ?>"><br/>
				<input class="text" placeholder="First Name" type="text" name="firstName" value ="<?php global $fn; echo $fn; ?>"><br/>
				<input class="text" placeholder="Program" type="text" name="program" value ="<?php global $pr; echo $pr; ?>"><br/><br/>
				
        <input class="button" type="submit" value="Update Record" name="update">
				</form>
				<form method="post" action="PhpMyAdmin.php">
				<input class="button" type="submit" value="Back" name="back">
				
      </form><br/>
<?php
	if(array_key_exists('update',$_POST)){
		updateRecords();
	}
	
	
	function updateRecords(){
		include("connection.php");
		$sn = $_POST['studNo'];
		$ln = $_POST['lastName'];
		$fn = $_POST['firstName'];
		$pr = $_POST['program'];
		$sql = "UPDATE Student SET LastName = '$ln', FirstName = '$fn', Program = '$pr' WHERE StudentNumber = $sn";
		$res = mysqli_query($mysqli, $sql);
		if($res){
			echo "Changes Saved.";
		}
	}
	
	
?>
