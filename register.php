<?php
include 'header.php';
?>
<form method="post">
	   <div class="form-group">

	<label id="p1">Create your Account</label> <br>
	<input type="text" id="t1" name="mail" placeholder="Email Address"><br>
	
</div>
	<?php 
	$f=0;
	if (isset($_POST['create'])) {
		# code...
	
	if ($_POST['create']){
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

	<input type="password" id="t1" name="pass" placeholder="Create your own Password"><br>
</div>
	<?php 
	if (isset($_POST['create'])) {
	if ($_POST['create']){
			
			if (preg_match("/^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/", $_POST['pass'])){
				if (empty($_POST['pass'])) 
				{
					echo "*Password should not be empty";
				} 
				else{

				echo "*Give a valid Password ";
						}
					}
					else{
						$pass=$_POST['pass'];
						 $pass = md5($pass);  
						
						$f++;
					}				
				
			}
		}
					?>
					
	<div class="form-group">
         <input type="submit" name="create" class="btn btn-primary"value="Submit">
        </div>
	<?php
	if ($f==2) {

	include 'dbconnect.php';
	$sql=mysqli_query($link,"SELECT email,password FROM login WHERE email='".$mail."' AND password='".$pass."'");
$rows=mysqli_num_rows($sql);

if($rows>0)
{
echo "<span style='margin-left: 7%;font-size: 74%;color: red;margin-top: -4%;position: absolute;'>Account already exists </span>";
}
 else {
    
    $sql= "INSERT INTO login (email, password) VALUES ('".$mail."', '".$pass."')";

if (mysqli_query($link, $sql)) {
    	    echo "<span style='margin-left: 7%;font-size: 74%;color: red;margin-top: -4%;position: absolute;'>Account Created Successfully </span>";
}
}
}
    ?>
    <a href="login.php" class="btn btn-link">Login Now</a>
</form>
   <?php
include 'footer.php';
?>

