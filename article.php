<?php
include 'header.php';
?>
<form name="form1" method="post" action="action.php">
   <div class="form-group">
  <label for="title">Title:</label>
      <input name="title" type="text" class="form-control" id="title" required="true">
    <br>
</div>
 <div class="form-group">
    <label for="bodytext">Body Text:</label>
      <textarea name="body" id="body" class="form-control" required></textarea>
     <br>
   </div>
    <div class="form-group">
         <button type="submit" name="add" class="btn btn-primary">Submit</button>
        </div>
  </form>
<?php
include 'footer.php';
?>
