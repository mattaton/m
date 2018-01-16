<!DOCTYPE html>
<html>
		<head>
				<title>Online Address Book</title>
				<meta charset="utf-8">
		</head>
		<style>
		p {
    font-size: 27px;
		}
    .button {
      background-color: #f4dc42;
      border: none;
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
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
		</style>
		<body>
			<center>
        <form  method="post">
        <p>Online Address Book</p>
        <input class="text" placeholder="Last Name, First Name Middle Initial..." type="text" name="name"> <br/>
				<input class="text" placeholder="Enter Address..." type="text" name="address"><br/>
				<input class="text" placeholder="Enter Phone Number..." type="text" name="phoneNumber"><br/><br/>
				
        <input class="button" type="submit" value="Add Contact" name="add">
				<input class="button" type="submit" value="Display Contacts" name="display">
				<input class="button" type="submit" value="Previous Contact" name="previous">
				<input class="button" type="submit" value="Next Contact" name="next">
				<input class="button" type="submit" value="Log Out" name="logout">
      </form><br/>

<?php session_start();

  function displayContacts(){
	
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phoneNumber = $_POST['phoneNumber'];
		
		$_SESSION["contact"][] = array(
			"Name" => $name,
			"Address" => $address,
			"Phone Number" => $phoneNumber
		);
		
		 echo $_SESSION["contact"]["Name"];

	}
	
	if (array_key_exists('display', $_POST))
	{
		displayContacts();
	}
	
	
	if (array_key_exists('logout', $_POST))
	{
		session_destroy();
	}
?>