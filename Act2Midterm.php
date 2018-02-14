<!doctype html>
<html>
<head>
<title>MidtermAct2</title>
</head>
<body>
    <form method = "post">

    <center><table border="1" cellpadding="3" cellspacing="0">
        <tr>
            <td>
        Password: <input type="text" name="password">  
        <input type="submit" name="submit" value="submit"><br> 
        </td></tr> 
        </table> 

        </center>  
  </form>
<?php
    function checkPassword(){
    $password = $_POST['password'];
    $len = strlen($password);
    $val = 0;
    $counter = "123456789ABCDEFGHJIKLMNOPQRSTUVWXYZASDFGHJKLabcdefghijklmnopqrstuvwxyz!@#$%^&*?><;:/|][)(+-*";
    $counterB= strtoupper($counter);
    $upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if($len >= 8){
		if(strpbrk($password, '0123456789') === False){
			echo"<center><h1> Weak Password.</h1>";
		}
		elseif (strpbrk($password, 'ABCDEFGHJIKLMNOPQRSTUVWXYZASDFGHJKL') === False) {  	
			echo"<center><h1> Weak Password.</h1>";
		}
		elseif(strpbrk($password,'!@#$%^&*?><;:/|][)(+-*') === False){
			echo"<center><h1> Weak Password.</h1>";
		}
		elseif(strpbrk($password,'abcdefghijklmnopqrstuvwxyz') === False){
			echo"<center><h1> Weak Password.</h1>";
		}
		else{
			for($k=0;$k<$len-1;$k++){
				for($m=0;$m<$len-1;$m++){
					if($password[$k] ===$upper[$m]){
						$val = $val + 1;
						$m = -1;
					}
					elseif($val > 2 AND $k === $len-1){
					echo"<center><h1> Weak Password.</h1>";
					$k = $k +$len+1;
					$m = $m + $len+1;
					}
				else{
					$k = $k + $len+1;
					$m = $m + $len+1;
					for($i=0;$i<$len-1;$i++){
						for($b=1;$b<$len-1;$b++){
							if($password[$i]===$password[$b] AND $password[$i] === $password[$b+2]){
								echo"<center><h1> Weak Password.</h1>";
								$b = $b + $len+1;
								$i = $i + $len+1;
							}
							elseif ($i === $len-2){
								for($a=0;$a<$len-1;$a++){
									for($g=0;$g<strlen($counter)-1;$g++){
										if(substr(strtoupper($password),$a,3) === substr($counterB,$g,3)){
											echo"<center><h1> Weak Password.</h1>";
											$g = $g + $len+1;
											$a = $a + $len+1;
										}
										elseif($a === $len-4){
											echo"<center><h1> Strong Password.</h1>";
											$g = $g + $len+1;
											$a = $a + $len+1;
										}
									}
								}
								$b = $b + $len+1;
								$i = $i + $len+1;
							}   
						}
					}
				}    
			}
			}
		}     
    }
	else{
        echo"<center><h1> Weak Password.</h1>";
    }
    }
      if (array_key_exists('submit', $_POST)){
        checkPassword();         
      }    
?>
</body>
</html>

