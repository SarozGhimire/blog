<?php include('header.php'); ?>
<?php include('dbConnection.php');	?>

<?php require_once 'process.php'?>
<div class="container">
	<?php
		$result = $conn->query("SELECT * FROM data") or die($conn->error);

	?>
	<div class="row justify-content-center">

		<a href="add.php">ADD</a>
		

	</div>

<div class="row justify-content-center">
	<table class="table">
	<thead>
      <tr>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <?php
				while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['category']; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td>
							<a href="edit.php?edit=<?php echo $row['id']; ?>"
								class="btn btn-info">Edit</a>
							<a href="process.php?delete=<?php echo $row['id']; ?>"
								class="btn btn-danger">Delete</a>
						</td>
				</tr>
  <?php endwhile; ?>				
  </table>


<?php include('footer.php'); ?>