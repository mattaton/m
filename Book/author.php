<!DOCTYPE html>
<?PHP ?>
<html>
<head>
	<title>Add Author</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<style>
	table
	{
		border-spacing: 15px;

	}
	</style>
	</head>
<body>
	<div class="container">
		<div class="panel-heading">
			<div class="main-login">
			<center><h1>Author</h1></center>
				<form class="form-group" method="post">
				
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Author ID</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="authID" id="aId"  placeholder="Enter Author ID"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Author Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="authorName" id="aName"  placeholder="Enter Author Name"/>
								</div>
							</div>
						</div>
						</br>
						<div class="form-group ">
							<button type="submit" name="addBook" class="btn btn-danger">Add Author</button>
							<button type="submit" name="display" class="btn btn-danger">Display</button>
						</div>
						<hr>
						<div class="form-group ">
							<label class="cols-sm-2 control-label">Search</label>
							<input type="text" name="searchBox" class="form-control" placeholder ="Search Book Title">
							</br>
							<button type="submit" name="searchBtn" class="btn btn-info">Search</button>
						</div>

				</form>
				<hr class="style2">
				<?php
				$id = 0;
					function addBook(){
						include("connection.php");
						
						
						$aid = $_POST['authID'];
						$an = $_POST['authorName'];
						
						
						$sql = "INSERT INTO author VALUES($aid,'$an')";
						$success = mysqli_query($mysqli,$sql);
						if($success === TRUE){
							echo"Book Added";
						} else {
							echo"Failed to insert record";
						}
					}
					
					function displayRecords(){
						include("connection.php");
						$sql = "SELECT * FROM author";
						$res = mysqli_query($mysqli,$sql);
						echo "<center>";
						echo"<table style=\"border: 1px solid black\">";
						echo"<tr>
							<th style='border: 1px solid black'>Author ID</th>
							<th style='border: 1px solid black'><center>Author Name</center></th>
							<th style='border: 1px solid black' colspan='2'><center>Actions</center></th>
							</tr>";
						while($data = mysqli_fetch_array($res,MYSQLI_ASSOC)){
						echo"<tr>";
						global $id;
						$id = $data['AuthorID'];
						foreach($data as $val){
						echo"<td style=\"border: 1px solid black\">";
							echo "<center>";
							echo $val."";
							echo"</td>";
						}
							echo "
							<td>
							<form method = 'post'  action='editAuthor.php'>
							<input type = 'hidden' name = 'id' value = $id >
							<input type='submit' class='btn btn-success'  name='edit' value = 'Edit' >
							</form>
							</td>
							<td>
							<form method = 'post'>
							<input type = 'hidden' name = 'id' value = $id>
							<input type='submit' class='btn btn-danger' name='delete' value = 'Delete'>
							</td>
							</form>";
							echo "</tr>";
						}
						echo"</table>";
						echo"</br>";
						
					}
						
					function searchRecords(){
						include("connection.php");
						$sr = $_POST['searchBox'];
						$sql = "SELECT * FROM author WHERE AuthorName LIKE '%$sr%'";
						$res = mysqli_query($mysqli,$sql);
						echo "<center>";
						echo"<table style=\"border: 1px solid black\">";
						echo"<tr>
							<th style='border: 1px solid black'>Author ID</th>
							<th style='border: 1px solid black'><center>Author Name</center></th>
							<th style='border: 1px solid black' colspan='2'><center>Actions</center></th>
							</tr>";
						while($data = mysqli_fetch_array($res,MYSQLI_ASSOC)){
						echo"<tr>";
						global $id;
						$id = $data['AuthorID'];
						foreach($data as $val){
						echo"<td style=\"border: 1px solid black\">";
							echo "<center>";
							echo $val."";
							echo"</td>";
						}
							echo "
							<td>
							<form method = 'post'  action='editAuthor.php'>
							<input type = 'hidden' name = 'id' value = $id >
							<input type='submit' class='btn btn-success'  name='edit' value = 'Edit' >
							</form>
							</td>
							<td>
							<form method = 'post'>
							<input type = 'hidden' name = 'id' value = $id>
							<input type='submit' class='btn btn-danger' name='delete' value = 'Delete'>
							</td>
							</form>";
							echo "</tr>";
							echo "</tr>";
						}
						echo"</table>";
					}
					function deleteRecord(){
						include("connection.php");
						$aid = $_POST['id'];
						$sql = "DELETE FROM author WHERE AuthorID = $aid";
						$res = mysqli_query($mysqli,$sql);
						displayRecords();
					}
					
						
					if(array_key_exists('addBook',$_POST)){
							addBook();
							
					}
					
					if(array_key_exists('delete',$_POST)){
							deleteRecord();
							
					}
					if(array_key_exists('display',$_POST)){
							displayRecords();
							
					}
					if(array_key_exists('searchBtn',$_POST)){
							searchRecords();
							
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