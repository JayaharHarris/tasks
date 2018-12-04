<?php
include 'header.php';
session_start();
?>      <div class="col-sm-3" style="float: right;">
   <a href="logout.php" class="btn btn-primary">Logout</a>

</div>
         <div class="article-box">
<h2><?php
   $s=$_SESSION['email'];
   if ($s=="") {
         header('location:index.php');
      }  
 echo ' Welcome ' . $_SESSION['email'] .'!';
 ?></h2>
         	<div class="article" class="col-sm-6"> 
               <div class="add">
   
<a href="article.php" class="btn btn-primary">Add Article</a>

</div>

 <?php
   include 'dbconnect.php';
   $table_name = mysqli_real_escape_string($link,'article');
$query = "SELECT * FROM " .$table_name;
$result = mysqli_query($link,$query);

if (mysqli_num_rows($result) > 0){
					echo ("<table class='table' width='100%'>  <col width='130'>
  
               
            <tr>
                <th>Title</th>
                <th>Desc</th>
            </tr> ");

 while($myrow = mysqli_fetch_assoc($result))
             {//begin of loop

$short=$myrow['body'];
$desc=substr($short, 0,170);


				echo "<tr>";
				echo "<td>";
               echo $myrow['title'];
              
				
				
				echo "<td>";
               echo $desc.".....";
               echo "<td>";
               echo ('<br><a href="ShowArticle.php?id='.$myrow["id"].'">Read More...</a>');
echo "</td>";

               echo "</td>";
               echo "</td>";
				echo "</tr>";
             
echo "<tr>";
				
              
				echo "</tr>";
             }//en

echo "</table>";

         }

         else
         {

         	echo "<b>No articles have been added";
         }
?>

</div> 


         </div>
         <?php
include 'footer.php';
?>
