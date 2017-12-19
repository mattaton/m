<!DOCTYPE html>
<html>
    <head>
        <title>Pascal Triangle</title>
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
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
  }
  input[type=text], select {
    width: 30%;
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
        <p>Pascal's Triangle</p>
        <input class="text" placeholder="Enter Numbers 1-12..." type="text" name="rows">
        <input class="button" type="submit" value="Display" name="submit">
      </form><br/>

<?php
  function displayPascalTriangle(){
        $rows = $_POST['rows'];
        $length = $rows;
        if($rows <= 12){
          echo '<table width="25%" cellspacing="0" style="border: 1px solid black ">';
          for($i = 0; $i < $rows; $i++){
            $b = 1;
            echo '<tr>';
            for($a = 0; $a <= $i; $a++){
                echo '<td colspan="'.(($length * $length) / ($i+1)).'" style="border: 1px solid black; padding: 3px; text-align: center; ">';
                echo $b , "</td>";
                $b = $b * ($i - $a) / ($a + 1);
            }
            echo '<tr>';
          }
          echo '</table>';
        }
        if (empty($rows)) {
          echo '<h1>Please Enter a Number.</h1>';
        }
        if ($rows > 12) {
          echo '<h1>Numbers 1-12 Only.</h1>';
        }
				if ($rows <=0) {
					echo '<h1>Numbers 1-12 Only.</h1>';
				}
      }
      if(array_key_exists('submit',$_POST)){
  		displayPascalTriangle();
  		}
?>
        </table>
      </center>
    </body>
</html>