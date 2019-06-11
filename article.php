<?php
	include_once("includes/connection.php");
	include_once("includes/article.php");

	$article = new Article;

	if (isset($_GET["id"])){

		$id = $_GET["id"];
		$data = $article->fetch_data($id);

		?>

<!DOCTYPE html>
<html>
	<head>
			<title>Günlük</title>
			<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<div class="container">
			<a href="index.php" id="logo">Batuhan'ın Film Günlüğü</a>

			<h3><?php echo $data["article_title"]; ?> 
			<small><?php echo date("l, jS", $data["article_timestamp"]); ?></small></h3>

			<p><?php echo $data["article_content"]; ?></p>

			<a href="index.php">&larr; Geri</a>
		</div>
	</body>
</html>

		<?php

	}else{
		header("Location: index.php");
		exit();
	}
?>