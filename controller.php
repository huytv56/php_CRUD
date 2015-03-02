<?php
	include('model.php');

	$username;
	$password;



	if(isset($_POST["insert"])){
		if($_POST["insert"]=="yes"){
		$username=$_POST["username"];
		$password=$_POST["password"];

	$query="insert into user(username, password) values('$username', '$password')";
	if(mysql_query($query))
	echo "<div class='row alert alert-success'> <center>User Inserted!</center> </div>";
		}
	}

	if(isset($_POST["update"])){
		if($_POST["update"]=="yes"){
		$username=$_POST["username"];
		$password=$_POST["password"];

	$query="update user set username='$username' , password='$password' where id=".$_POST['id'];
	if(mysql_query($query))
	echo "<div class='row alert alert-success'><center>User Updated</center></div>";
		}
	}

	if(isset($_GET['operation'])){
	if($_GET['operation']=="delete"){
	$query="delete from user where id=".$_GET['id'];
	if(mysql_query($query))
	echo "<div class='row alert alert-success'><center>User Deleted!</center><br></div>";
	}
	}

	include('view.php');