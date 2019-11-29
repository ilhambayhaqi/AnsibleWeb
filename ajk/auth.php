<?php

require_once("config.php");

session_start();
if(!isset($_SESSION["user"])) header("Location: login.php");
else{
	$username = $_SESSION['user']['username'];

	$sql = "SELECT * FROM users WHERE username=:username";
    $stmt = $db->prepare($sql);
 
    // bind parameter ke query
    $params = array(
        ":username" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

	$_SESSION['user'] = $user;
}

?>