<?php 
session_start();
	$conn = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($conn));
$id = 0;
$update =  false;	
$category = '';
$title = '';
$description = '';

include('dbConnection.php');

if (isset($_POST['save'])){

	$category = $_POST['category'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	$conn->query("INSERT INTO data (category,title,description) VALUE('$category', '$title', '$description')") or
	          die($conn->error);

	header("location: index.php");
}

if (isset ($_GET['delete'])){
	$id = $_GET['delete'];
	$conn->query("DELETE FROM data WHERE id=$id") or die($conn->error());

	header("location: index.php");

}

if (isset ($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error());
	if (count($result)==1){  
		$row = $result->fetch_array();
		$category = $row['category'];
		$title = $row['title'];
		$description = $row['description'];
	}
}
	
	if (isset ($_POST['update'])){
	$id = $_POST['id'];
	$category = $_POST['category'];
	$title = $_POST['title'];
	$description = $_POST['description'];


	$conn->query("UPDATE data SET category='$category', title='$title', description='$description' WHERE id=$id") or die($conn->error);

	header("location: index.php");
	}
