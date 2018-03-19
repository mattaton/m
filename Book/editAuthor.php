<!DOCTYPE html>
<?PHP ?>
<html>
<head>
	<title>Edit Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<?php
		if(isset($_POST['id'])){
			include("connection.php");
			$aid = $_POST['id'];
			$sql = "SELECT * FROM author WHERE AuthorID = $aid";
			$res = mysqli_query($mysqli,$sql);
			$data = mysqli_fetch_array($res,MYSQLI_ASSOC);
			
			$aid = $data['AuthorID'];
			$an = $data['AuthorName'];
		}
	
	?>
	</head>
<body>
	<div class= "container">
		<div class="panel-heading">
			<div class="main-login">
				<center><h1>Edit Book</h1></center>
				<form class="form-group" method="post">
				
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Author ID</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="authorID" id="authID"  placeholder="Enter Student Number" value="<?php global $aid; echo $aid ?>" readonly/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Author Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="authorName" id="aName" value="<?php global $an; echo $an ?>"  placeholder="Enter AuthorName"/>
								</div>
							</div>
						</div>
						</br>
						<div class="form-group ">
							<button type="submit" name="save" class="btn btn-success">Update Record</button>
							<button type="submit" name="back" class="btn btn-info">Back</button>
						</div>
						<div class="form-group ">
							
						</div>

				</form>
				<hr class="style2">
				<?php
				$id = 0;
					function save(){
						include("connection.php");
						$authID = $_POST['authorID'];
						$an = $_POST['authorName'];
						
						$sql = "UPDATE author SET authorName = '$an' WHERE AuthorID ='$authID'  ";
						$success = mysqli_query($mysqli,$sql);
						if($success === TRUE){
							echo"Record Updated";
						} else {
							echo"Failed to update record";
						}
					}
					
					if(array_key_exists('save',$_POST)){
							save();
							
					}
					if(array_key_exists('back',$_POST)){
							header('Location: author.php');
							
					}
							
					
					?>
			</div>
		</div>
	</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>