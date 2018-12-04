<?php
session_start();
$_SESSION['email']="";
include 'header.php';
?>
<!-- <img src="1.jpg" width="101.45%" style="margin: -10px -20px -10px -10px; position: absolute;"> -->
<form method="post">
	   <div class="form-group">

	<label>Sign in</label><br> 
	<input type="text" id="t1" name="mail" placeholder="Email Address"><br>
	</div>
	<?php 
	$f=0;
	if (isset($_POST['sign'])) {
	if ($_POST['sign']){
			if (!preg_match("/^[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,3}$/", $_POST['mail'])){
				if (empty($_POST['mail']))
				{
					echo "*E-mail is empty";
				}
				else
				{
					echo "*E-mail not valid";
				}
			}
				else{
			$mail=$_POST['mail'];
			$f++;
			 }
			}
			}
			 ?>
			 <br>
			    <div class="form-group">

	<input type="password" id="t1" name="pass" placeholder="Password"><br>
</div>
	<?php 
	if (isset($_POST['sign'])) {
	if ($_POST['sign']){
				if (!empty($_POST['pass'])) {
				$pass=$_POST['pass'];
				$pass = md5($pass);
				$pass=mysql_escape_string($pass);  
				$f++;
			}else{
				echo "*Password is empty";
			}
			}
		}
?>
				<div class="form-group">

	<input type="submit" id="b1" name="sign" class="btn btn-primary" value="Login"><br>
</div>
<?php
	if ($f==2) {

	include 'dbconnect.php';
$sql=mysqli_query($link,"SELECT email,password FROM login WHERE email='".$mail."' AND password='".$pass."'");
$rows=mysqli_num_rows($sql);

if($rows>0)
{
	$row = mysqli_fetch_assoc($sql);
	$_SESSION['email']= $row['email'];
    $password=$row['password'];
   

if ($mail==$_SESSION['email']&&$pass==$password) {
     	 header('location:welcome.php');
    }

}
else{
	
    	echo "<span style='margin-left: 7%;font-size: 74%;color: red;margin-top: -4%;position: absolute;'>*Invalid Email or Password</span>";
    } 
}
	?>
	<a href="register.php" id="p3" class="btn btn-link" >No account? Create One!</a>
	</form>
	   <?php
include 'footer.php';
?>

