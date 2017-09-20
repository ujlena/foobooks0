<?php

require('helpers.php');

$booksJson = file_get_contents('books.json', true); 

//var_dump($booksJson);

$books = json_decode($booksJson, true);






if(isset($_GET["keyword"])) {
	$keyword = $_GET["keyword"];
} else {
	$keyword = "";
}


if (isset($_GET["caseSensitive"])) {
	$caseSensitive = true;
} else {
	$caseSensitive = false;
}


dump($caseSensitive);

$hasResults = true;



if ($keyword != "") {
	foreach ($books as $title => $book) {


		if($caseSensitive) {
			$match = $title == $keyword;
		} else {
			$match = strtolower($title) == strtolower($keyword);
		}

		if (!$match) {
			unset($books[$title]);
		}
		
		
	}
}


if (count($books) == 0) {
	$hasResults = false;
}



//debugging statements
/*dump($_GET);
dump($keyword);*/ 

//dump($books);
//var_dump($books['The Bell Jar']['author']);
//dump($books['The Bell Jar']['author']);