<?php

require_once("config.php");

if(!empty($_SESSION['message'])) {
   	$message = $_SESSION['message'];
	?>
		<script>alert("<?php echo $message ?>")</script>
	<?php
	$_SESSION['message'] = NULL;
}

if(isset($_POST['register'])){
	
    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	
    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="css/styles2.css">
</head>
<body>
<div class="split left">
		<div id="module">
		</div>
		<div class="box1">
			<a href="index.php">
			<ul>
				<li><img src="img/logo.png"</li>
				<li><h1>My Coba</h1></li>
			</ul>
			</a>
		</div>
		<div class="box2">
			<h2>Register</h2>
			<form action="" method="post">
				
				<div class="text-box">
					<label for="username"></label>
					<input type="text" placeholder="Username" name="username" required>
				</div>
				<div class="text-box">
					<label for="name"></label>
					<input type="text" placeholder="Name" name="name" required>
				</div>
				<div class="text-box">
					<label for="email"></label>
					<input type="email" placeholder="Email" name="email" required>
				</div>
				<div class="text-box">
					<label for="password"></label>
					<input type="password" placeholder="Password" name="password" required>
				</div>
				<input class="btn" type="submit" name="register" value="Submit">
				
			</form>
			<a href="login.php">Sudah punya akun ?</a>
		</div>
	</div>
	<div class="split right">
	</div>
</body>
</html>