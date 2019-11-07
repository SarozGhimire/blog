<?php include('header.php'); ?>
<?php include('dbConnection.php');	?>
<a href="index.php">Back</a>
<form action="process.php" method="post">
    <div class="form-group">
  <label>Category</label>
  <select name="category">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
  </select>
  </div>

  <div class="form-group">
  <label>Title</label>
  <input type="text" name="title">
  </div>

  <div class="form-group">
  <label>Description</label>
  <textarea rows="6" cols="70" placeholder="Write about yourself" name="description"></textarea>
  </div>

  <div class="form-group">  
  <button type="submit" class="btn btn-primary" name="save">Save</button>
  </div>

</form>

<?php include('footer.php'); ?>