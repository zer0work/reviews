<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Главная</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src='../../js/main.js'></script>
	<script src='https://code.jquery.com/jquery-2.x-git.min.js' defer></script>
</head>
<body>
	<header>


		<nav class="main-nav container-fluid">
			<ul>
				<li><a href="/">Главная</a></li>
				<li><a href="/#add">Добавить отзыв</a></li>
				<li><a href="/auth">Админка</a></li>
				<li><a href="../../dayside/index.php">dayside</a></li>
			</ul>
		</nav>


	</header>

		<?php include __DIR__ . '/' . $content_view; ?>


</body>
</html>