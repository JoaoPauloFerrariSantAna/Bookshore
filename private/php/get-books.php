<?php

include("connect.php");

$book_name	= $_POST["book-name"];
$pages_read	= $_POST["pages-read"];
$total_pages	= $_POST["total-pages"];

function update_books_read(string $uname): void {
	$mysql			= connect_db();
	$tbl_template		= $uname."s_books";
	$new_amount_books	= $_SESSION["books_read"] + 1;

	$update_query		= "UPDATE ".$tbl_template." SET books_read = ".$new_amount_books;
/*
 * $mysql		= connect_db();
 * update_stmt		= $mysql->prepare("UPDATE ".$template." SET books_read = ?");
 *
 * $update->bind_param('i', $new_amount_books)
 * $update->execute();
 * */

}

function insert_book(int $uid, string $book_name, int $pages_read, int $total_pages): void {
	$mysql = connect_db();

	$tbl_template	= $_SESSION["username"]."s_books";
	$insert		= "INSERT INTO ".$tbl_template."(user_id, book_name, pages_read, total_pages)
			VALUES(".$uid.",\"".$book_name."\",".$pages_read.','.$total_pages.')';

	$result = $mysql->query($insert);
	$mysql->close();
	$result->free();

	$mysql = NULL;
}

update_books_read($_SESSION["username"]);
insert_book($_SESSION["user_id"], $book_name, $pages_read, $total_pages);

?>
