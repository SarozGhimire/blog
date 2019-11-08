<?php 
session_start();
$id = 0;
$update =  false;	
$category = '';
$title = '';
$description = '';
$feature = '';
$password = '';
$tag = '';

include('dbConnection.php');

if (isset($_POST['save'])){

	$category = $_POST['category'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$feature = $_POST['feature'];
	$password = $_POST['password'];
	$tag_array = $_POST['tag'];


	$tag = implode(',', $tag_array);


	$conn->query("INSERT INTO data (category,title,description,feature,password,tag) VALUE('$category', '$title', '$description', '$feature', '$password', '$tag')") or
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
		$feature = $row['feature'];
		$password = $row['password'];
		$tag = $row['tag'];
	}
}
	
	if (isset ($_POST['update'])){
	$id = $_POST['id'];
	$category = $_POST['category'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$feature = $_POST['feature'];
    $password = $_POST['password'];
	$tag_array = $_POST['tag'];


	$tag = implode(',', $tag_array);

	$conn->query("UPDATE data SET category='$category', title='$title', description='$description', feature='$feature', password='$password' ,tag='$tag' WHERE id=$id") or die($conn->error);

	header("location: index.php");
	}
