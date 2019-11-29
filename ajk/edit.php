<?php 
require_once("auth.php");
require_once("config.php");

if(!empty($_SESSION['message'])) {
   	$message = $_SESSION['message'];
	?>
		<script>alert("<?php echo $message ?>")</script>
	<?php
	$_SESSION['message'] = NULL;
}

$id = $_SESSION['user']['id'];
$username = $_SESSION['user']['username'];

if(isset($_POST['btnsave'])){
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if(!empty($_POST['email'])) $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	else $email = $_SESSION['user']['email'];
	
	if(!empty($_POST['password'])) $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	else $password = $_SESSION['user']['password'];
	
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
	
	if($_FILES["photo"]["size"] != 0 && $_FILES["photo"]["size"] < 5000000){
		move_uploaded_file($_FILES["photo"]["tmp_name"],"img/".$_FILES["photo"]["name"]);
		$photo = $_FILES["photo"]["name"];
	}
	else{
		$photo = $_SESSION['user']['photo']; 
		if($_FILES['photo']['size'] >= 5000000)
			$_SESSION['message'] = "Image must be 5MB or less";
	} 
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', phone = '$phone', address = '$address', photo = '$photo' WHERE id = '$id'";
	$db->exec($sql);
	
	//update data
	 header("Location: edit.php");
}
	
if(isset($_POST['delete'])){
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE from users WHERE id = '$id'";
	$db->exec($sql);
	header("Location: logout.php");
}


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
    <title>Profile</title>
</head>
<body>	
	<div class="topnav" id="myTopnav">
		<a href="timeline.php">Home</a>
		<a href="edit.php" class="active">Edit</a>
		<a href="view.php">Users</a>
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
		<div class="box1">
			<h1>Edit Profil</h1>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
					<td><label>Username</label></td>
						<td><input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['user']['username'] ?>" readonly></td>
					</tr>

					<tr>
					<td><label>Nama</label></td>
						<td><input type="text" name="name" placeholder="Nama Lengkap" value="<?php echo $_SESSION['user']['name'] ?>" required></td>
					</tr>
					
					<td><label>Email</label></td>
						<td><input type="text" name="email" placeholder="Email" value="<?php echo $_SESSION['user']['email'] ?>" required></td>
					</tr>
				
					<td><label>Telepon</label></td>
						<td><input type="text" name="phone" placeholder="Kosong" value="<?php echo $_SESSION['user']['phone'] ?>"></td>
					</tr>
			
					<td><label>Alamat</label></td>
						<td><input type="text" name="address" placeholder="Kosong" value="<?php echo $_SESSION['user']['address'] ?>"></td>
					</tr>
		
					<td><label>Ubah Password</label></td>
						<td><input type="text" name="password" placeholder="Password Baru" value="" /></td>
					</tr>
			
					<tr>
					 <td><label>Ubah Foto</label></td>
						<td><input type="file" name="photo" accept="image/"></td>
					</tr>

					<tr>
						<td><button type="submit" name="btnsave"> Save</button>
						</td>
					</tr>
					<tr>
						<td><button type="submit" name="delete"> Hapus Akun</button></td>
					</tr>
				</table>
			</form>
		
		</div>
	</div>
		

</body>
</html>