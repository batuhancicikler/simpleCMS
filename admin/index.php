<?php

session_start();
include_once("../includes/connection.php");

if(isset($_SESSION["logged_in"])){
	?>

	<!DOCTYPE html>
<html>
	<head>
			<title>Admin</title>
			<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="../index.php" id="logo">Batuhan'ın Film Günlüğü</a><br/>
			<ol>
				<li><a href="add.php">Makale ekle</a></li>
				<li><a href="delete.php">Makale sil</a></li>
				<li><a href="logout.php">Çıkış yap</a></li>
			</ol>
		</div>
	</body>
</html>

	<?php
}else{
	
	if(isset($_POST["user"], $_POST["pass"])){
		$username = $_POST["user"];
		$password = md5($_POST["pass"]);

		if(empty($username) or empty($password)){
			$error = "Boşluk bırakmayın !";
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name=? AND user_pass=?");

			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if($num == 1){
				$_SESSION["logged_in"] = true;

				header("Location: index.php");
				exit();
			}else{
				$error = "Yanlış giriş !";
			}
		}
	}

	?>

	<!DOCTYPE html>
<html>
	<head>
			<title>Günlük</title>
			<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">Batuhan'ın Film Günlüğü</a><br/><br/>

			<?php if(isset($error)){ ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small><br/><br/>
			<?php } ?>

			<form action="index.php" method="post" autocomplete="off">
				<input type="text" name="user" placeholder="Username"/>
				<input type="password" name="pass" placeholder="Password"/>
				<input type="submit" value="Giriş"/>
			</form>
		</div>
	</body>
</html>

	<?php
}

?>