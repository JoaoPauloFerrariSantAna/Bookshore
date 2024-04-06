<?php

// In a database, ";" ends the query, this function will remove that, and the ampesant
// because I don't want SQLInjections on my site
function rm_html_chars(string $data_with_html): string {
	$what_to_search	= "/[\&;]/";
	$no_html_str	= preg_replace($what_to_search, '', $data_with_html);

	return $no_html_str;
}

?>
