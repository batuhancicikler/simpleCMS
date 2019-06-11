<?php 

session_start();
include_once("../includes/connection.php");

if(isset($_SESSION["logged_in"])){
	if(isset($_POST["title"], $_POST["content"])){

		$title = $_POST["title"];
		$content = nl2br($_POST["content"]);

		if(empty($title) or empty($content)){
			$error = "Alanlar boş bırakılamaz !";
		}else{
			$query = $pdo->prepare("INSERT INTO articles 
				(article_title, article_content, article_timestamp) VALUES (?, ?, ?)");

			$query->bindValue(1, $title);
			$query->bindValue(2, $content);
			$query->bindValue(3, time());

			$query->execute();

			header("Location: index.php");
		}
	}

?>

	<!DOCTYPE html>
<html>
	<head>
			<title>Makale Ekle</title>
			<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">Batuhan'ın Film Günlüğü</a><br/>
			
			<h2>Makale Ekle</h2>

			<?php if(isset($error)){ ?>
				<small style="color:#aa0000;"><?php echo $error; ?></small><br/><br/>
			<?php } ?>

			<form action="add.php" method="post" autocomplete="off">
				<input type="text" name="title" placeholder="Title" /><br/><br/>
				<textarea rows="15" cols="65" name="content" placeholder="Content"></textarea><br/><br/>
				<input type="submit" value="Ekle"/>
			</form>
			<br/><a href="index.php">&larr; Geri</a>
		</div>
	</body>
</html>

<?php
}else{
	header("Location: index.php");
}

?>