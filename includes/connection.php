<?php
try {
		$pdo = new PDO("mysql:host=localhost;dbname=cms_blog", "root", "");
} catch (PDOException $e) {
	exit("Database hatası !");
}
?>