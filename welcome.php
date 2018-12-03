<?php
include 'header.php';
?>
         <div class="article-box">

         	<div class="article"> 
               <div class="add">
   
<a href="article.php" class="btn btn-default">Add Article</a>

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
