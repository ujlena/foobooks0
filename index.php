<?php require('getAllBooks.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href="/css/styles.css" rel="stylesheet">
</head>
<body>
	<h1>Foobooks</h1>

	<form method="GET" action="index.php">


		<label for="keyword">Filter by Keyword: </label>
		<input type="text" name="keyword" id="keyword" value="<?=sanitize($keyword)?>">
		<br>

		<input type="checkbox" name="caseSensitive" id="caseSensitive" <?php if($caseSensitive) echo "CHECKED"; ?>>
		<label for="caseSensitive">Case Sensitive</label>
		<br>

		<input type="submit" class="btn btn-primary btn-small" value="Filter books">


	</form>

	
	<?php if (!$hasResults) : ?>
		<div class="alert alert-warning">Your keyword did not match any results</div>
	<?php elseif ($keyword != "") : ?>
		<div class="alert alert-info">You searched for: <strong><?=sanitize($keyword)?></strong></div>
	<?php endif; ?>


	<?php foreach ($books as $title => $book) : ?>
		<div class="book">
			<h2><?=$title?></h2>
			<h3>Author: <?=$book['author']?></h3>
			<h3>Published year: <?=$book['published']?></h3>
		</div>
	<?php endforeach; ?>

</body>
</html>