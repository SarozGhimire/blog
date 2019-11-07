<?php include('header.php'); ?>
<?php include('dbConnection.php');
$id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM data where id = $id") or die($conn->error);
while ($row = $result->fetch_assoc()):
	?>
<a href="index.php">Back</a>
<form action="process.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">
  <label>Category</label>
  <select name="category">
    <option value="1" <?php if ($row['category'] == 1): ?>
      selected 
    <?php endif ?>>One</option>
    <option value="2" <?php if ($row['category'] == 2): ?>
      selected 
    <?php endif ?>>Two</option>
    <option value="3" <?php if ($row['category'] == 3): ?>
      selected 
    <?php endif ?>>Three</option>
    <option value="4" <?php if ($row['category'] == 4): ?>
      selected 
    <?php endif ?>>Four</option>
  </select>
  </div>

  <div class="form-group">
  <label>Title</label>
  <input type="text" name="title" value="<?php echo $row['title']; ?> ">
  </div>

  <div class="form-group">
  <label>Description</label>
  <textarea rows="6" cols="70" placeholder="Write about yourself" name="description"><?php echo $row['description']; ?></textarea>
  </div>

  <div class="form-group">
    <button type="Submit" class="btn btn-primary" name="update">Update</button>
  </div>

</form>
<?php endwhile; ?>
<?php include('footer.php'); ?>