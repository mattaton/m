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
        <p>Online Address Book</p>
        <input class="text" placeholder="Last Name, First Name Middle Initial..." type="text" name="name"> <br/>
				<input class="text" placeholder="Enter Address..." type="text" name="address"><br/>
				<input class="text" placeholder="Enter Phone Number. ####-###-####" type="text" name="phoneNumber"><br/><br/>
				
        		<input class="button" type="submit" value="Add Contact" name="add">
				<input class="button" type="submit" value="Display Contacts" name="display">
				<input class="button" type="submit" value="Previous Contact" name="previous">
				<input class="button" type="submit" value="Next Contact" name="next">
				<input class="button" type="submit" value="Log Out" name="logout">
      </form><br/>

<?php session_start();

  function addContact(){
						$_SESSION["contact"][] = array(
							"Name" => $_POST['name'],
							"Address" => $_POST['address'],
							"Phone Number" => $_POST['phoneNumber']
						);
						
					}
					function display(){
						if(isset($_SESSION['contact'])==0){
							echo"<h1>There are no contacts.</h1>";
							echo"</div>";
						}
						else
							foreach($_SESSION['contact'] as $c){
								while(list($key,$val) = each($c)){
									echo "$key : $val <br>";
								}
								echo "<hr>";
							}
							$_SESSION['ctr']=0;

					}
					function nextContact($i){
						

						if (empty($_SESSION['contact'])){

							echo"<h1>There are no contacts.</h1>";
							echo"</div>";
						}
						else
							$c = count($_SESSION['contact']);
							if($i>$c-2){
								echo"<h1>No more contacts.</h1>";
								echo"</div>";
								$_SESSION['ctr']=$c-1;

							}
							else{
							$ctr=count($_SESSION['contact']);
							foreach($_SESSION['contact'][$ctr-$ctr+$i+1] as $key => $val){
									echo $key. ": ".$val. "<br>";
								}
							}

					}
					function previousContact($i){
						

						if (empty($_SESSION['contact'])){
							echo"<h1>There are no contacts available.</h1>";
							echo"</div>";
						}
						else
							if($i<0){
								echo"<h1>No more contacts.</h1>";
								echo"</div>";
								$_SESSION['ctr']=0;

							}
							else{
							$ctr=count($_SESSION['contact']);
							foreach($_SESSION['contact'][$i] as $key => $val){
								echo  $key .": ".$val."<br>";
								}
							}
					}
					if(array_key_exists('add',$_POST)){
						if(empty($_POST['name'])){
							echo"<h1>Missing Information!</h1>";
							echo"</div>";
						}
						elseif(empty($_POST['address'])){
							echo"<h1>Missing Information!</h1>";
							echo"</div>";
						}
						elseif(empty($_POST['phoneNumber'])){
							echo"<h1>Missing Information!</h1>";
							echo"</div>";
						}
						else {
							addContact();
							echo"<h1>Contact added!</h1>";
							echo"</div>";
						}
							
					}
					if(array_key_exists('display',$_POST)){
							display();
							
					}
					if(array_key_exists('logout',$_POST)){
							session_destroy();
							echo"<h1>Logged out.</h1>";
							echo"</div>";
							
					}
					if(array_key_exists('next',$_POST)){
							$i=$_SESSION['ctr'];
							nextContact($i);
							$_SESSION['ctr']++;

							
					}
					if(array_key_exists('previous',$_POST)){
							$i=$_SESSION['ctr']-1;
							previousContact($i);
							$_SESSION['ctr']--;
					}


?>