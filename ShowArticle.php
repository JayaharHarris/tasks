      <div class="col-sm-3" style="float: right;">
   <a href="logout.php" class="btn btn-primary">Logout</a>

</div>
<?php
session_start();
include 'header.php';
include 'dbconnect.php';
$s=$_SESSION['email'];
   if ($s=="") {
         header('location:index.php');
      }  

$table_name = mysqli_real_escape_string($link,'article');

$id=mysqli_real_escape_string($link,$_GET['id']);

$query = "SELECT * FROM " .$table_name. " WHERE id='$id'";

$result = mysqli_query($link,$query);
if (mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)) {
echo"<div class='article-box'";

    echo "<b>Title<br>";
                     echo $row['title'];
                     echo "</b><br>Body <i><br>";
                     echo $row['body'];
                     echo "<br>";
                     echo "</i><hr>";
                    
   		echo "</div>";
    }
}
else{
   echo"No article in the database";
}
mysqli_close($link); ?>
<?php
include 'footer.php';
?>