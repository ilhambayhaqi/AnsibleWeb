<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
        }
    }
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
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
			<h2>Login</h2>
			<form action="" method="post">

			<div class="text-box">
				<input type="text" placeholder="Username" name="username" value="">
			</div>
			<div class="text-box">
				<input type="password" placeholder="Password" name="password" value="">
			</div>
			<input class="btn" type="submit" name="login" value="Sign in">
			</form>
			<a href="register.php">Belum punya akun ?</a>
		</div>
	</div>
	<div class="split right">
	</div>
</body>
</html>