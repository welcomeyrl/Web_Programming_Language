<?php

if(!empty($_GET['book_id']))
	$book_id = ($_GET['book_id']);

$con = mysqli_connect('localhost','root');
if(!$con)
{
	die("Could not connect: " . mysqli_error($con));
}

mysqli_select_db($con,"books");
$sql1 = "SELECT * FROM book ";

if(!empty($book_id))
	$sql1 = $sql1 . " WHERE `book_id` = " . $book_id ;

$result = mysqli_query($con, $sql1);

$array_result = array();

while($row = mysqli_fetch_array($result))
{
	$temp_book_id = $row['book_id'];
	$result_set["book_id"] 	= $row['book_id'];
	$result_set["title"]= $row['title'];
	$result_set["book_year"] = $row['book_year'];
	$result_set["price"]= $row['price'];
	$result_set["category"]	= $row['category'];
	
	$sql2 = "SELECT `author_name` FROM `book_authors` ";
	$sql2 = $sql2 . " LEFT OUTER JOIN authors ON `book_authors`.`author_id` = authors.`author_id` WHERE `book_authors`.`book_id` = " . $row['book_id'];

	$author_result = array();
	
	$result_author = mysqli_query($con, $sql2);
	while($row_author = mysqli_fetch_array($result_author))
	{
		array_push($author_result, $row_author['author_name']);
	}
	
	$result_set["author_name"] = $author_result;
	
	array_push($array_result, $result_set);
}

header("HTTP/1.1 200 book found");
$json_response = json_encode($array_result);

echo $json_response;

mysqli_close($con);

?>