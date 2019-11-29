<?php
require_once("auth.php"); 
require("config.php");

$query = $db->prepare("SELECT * FROM users");
$query->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles3.css">
	<title>View All Users</title>
</head>
<body>	
	<div class="topnav" id="myTopnav">
		<a href="timeline.php">Home</a>
		<a href="edit.php">Edit</a>
		<a href="view.php" class="active">Users</a>
		<a href="ansible.php">Ansible</a>
		<a href="logout.php" class="out">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
 		</a>
	</div>

	
	<div class="split left">
		<div class="centered">
			<img src="img/<?php echo $_SESSION['user']['photo'] ?>" />
			<h3><?php echo  $_SESSION["user"]["name"] ?></h3>
			<p><?php echo $_SESSION["user"]["email"] ?></p>
		</div>
	</div>

	<div class="split right">
		<?php 
		while($row = $query->fetchObject()){ 
		if($row -> id == $_SESSION['user']['id']) continue;
		?>
		<div class="card">
			<div class="card-background">
				<img src="img/<?php echo $row -> photo ?>" class="card-image">	
			</div>
			<div class="card-info">
				<h2><?php echo $row -> name ?></h2>
				<h3><?php echo $row -> email ?></h3>
			</div>
		</div>	
		<?php } ?>
	</div>
		

</body>
</html>