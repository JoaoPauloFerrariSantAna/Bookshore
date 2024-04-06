<?php

include("connect.php");

/*
 * for the table containing the arguments for the bind_param function:
 * https://www.php.net/manual/en/mysqli-stmt.bind-param.php
 * */

/**
 *	@author		John	john@gmail.com
 *	@version	1.0.0			This function will verify if the username is already taken
 *	@since		1.0.0
 *	
 *	@param		int	$uname		The username that will be used to query similar names
 *	@return		int			Will return the ammount of similar names
 */
function is_name_taken(string $uname): int {
	$mysql 		= connect_db();
	$query 		= "SELECT username FROM users_tbl WHERE username = '$uname'";
	$result 	= $mysql->query($query);
	$similar_names 	= $result->num_rows;

	$mysql->close();
	$result->free();
	$mysql = NULL;

	return $similar_names;
}

/**
 * @author	John	john@gmail.com
 * @version	2.0.0	The function will return a int that is the row that says if
 *			user exist in db
 * @since	1.0.0
 *
 * @param	string	$uname		The username to search
 * @param	string	$password	The user password to search
 * @return	array			An associative array with information related to the user 
 */
function get_credentials(string $uname, string $password): array {
	$mysql		= connect_db();
	$select_stmt	= $mysql->prepare("SELECT user_ID, username, password 
			FROM users_tbl WHERE username = '?' AND password = '?'");

	$select_stmt->bind_param("ss",  $uname, $password);
	$select_stmt->execute();
	$select_stmt->store_result();
	$select_stmt->bind_result($uid, $name, $pass);
	$select_stmt->fetch();

	$rows = $select_stmt->affected_rows;

	$select_stmt->free_result();
	$select_stmt->close();

	$mysql = NULL;

	$user_info = [ $uid, $name, $pass ];

	return $user_info;
}

/**
 * @author	John	john@gmail.com
 * @version	2.0.0	The function will insert into a table specific to users with
 * 			with improved security
 * @since	1.0.0
 *
 * @param	string	$uname		The account username
 * @param	string	$password	The account password
 * @param	string	$umail		The account user email
 */
function insert_to_db(string $uname, string $password, string $umail): void {
	$mysql		= connect_db();
	$insert_stmt	= $mysql->prepare("INSERT INTO users_tbl(username, password, usermail) VALUES(?, ?, ?)");

	$insert_stmt->bind_param("sss", $uname, $password, $umail);
	$insert_stmt->execute();
	$insert_stmt->free_result();
	$insert_stmt->close();

	$mysql = NULL;
}

/**
 * @author	John	john@gmail.com
 * @version	1.0.0	The function will create a table to the user, 
 *			so that he can store his books at later date
 * @since	1.0.0
 *
 * @param	string	$uname
 */
function mk_tbl_for_user_books(string $uname): void {
	$tbl_template		= $uname."s_books";
	$book_name_space	= 50; // Might have to resize later...
	$books_read_size	= 4;
	$page_size		= 4;

	$mysql 	= connect_db();

	// This may cause problems in the future: possible SQL injection place
	// TODO: Find a way to make this query work with prepare stmts
	$create	= "CREATE TABLE ".$tbl_template."(
		user_id INT NOT NULL PRIMARY KEY,
		book_name VARCHAR(".$book_name_space."),
		books_read INT(".$books_read_size.") DEFAULT 0,
		pages_read INT(".$page_size."),
		total_pages INT(".$page_size."),
		FOREIGN KEY (user_id) REFERENCES users_tbl(user_ID)
	)";

	$mysql->query($create);
	$mysql->close();
	$mysql = NULL;
}

function get_books_read(string $uname): int {
	$tbl_template 	= $uname."s_books";

	$mysql = connect_db();
	$query = "SELECT books_read FROM ".$tbl_template;

	$get_amount_books	= $mysql->query($query);
	$amount_books		= $get_amount_books->num_rows;

	$mysql->close();
	$get_amount_books->free();

	$mysql = NULL;

	return $amount_books;
}

?>
