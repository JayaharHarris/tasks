<?php
include 'dbconnect.php';

if (isset($_POST['add'])) {
	# code...

   $title =mysqli_real_escape_string($link,$_POST['title']);
   $body =mysqli_real_escape_string($link,$_POST['body']);
   $table_name = mysqli_real_escape_string($link,'article');
   $query = "INSERT INTO " .$table_name. " (title, body)VALUES('$title', '$body')";
   echo $query;
   $result = mysqli_query($link,$query);
   $last_id = mysqli_insert_id($link);
   
   if(!$result){
      echo('Error adding Article: ' . mysqli_error());
     
   }else{
   // mysqli_close($link);
   echo('Success');
 
   header("Location:ShowArticle.php?id=".$last_id);
}
}
?>