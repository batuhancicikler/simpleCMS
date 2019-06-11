<?php
	include_once("includes/connection.php");
	include_once("includes/article.php");

	$article = new Article;
	$articles = $article->fetch_all();
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
		<h5>Nedir ? Ne Değildir ?</h5>
		<p style="font-size:15px; line-height: 15px;">Ben bir bilir kişi değilim, filmleri izledikten sonraki kabaca fikirlerimi
		kelimelere dökmek istedim. Yazdıklarım spoiler içerebilir ! Teşekkürler.</p>
		<ol>
			<?php foreach ($articles as $article) { ?>
				<li><a href="article.php?id=<?php echo $article["article_id"]; ?>">
					<?php echo $article["article_title"]; ?></a> - 
					<small>
						<?php echo date("l jS", $article["article_timestamp"]); ?>
					</small>
				</li>
		<?php } ?>
		</ol>
	</div>
</body>
</html>