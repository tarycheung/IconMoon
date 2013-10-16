<?php
define("EZSQL_DB_USER", 'tester');
define("EZSQL_DB_PASSWORD", '123');
define("EZSQL_DB_NAME", 'test');
define("EZSQL_DB_HOST", 'localhost');
if (!function_exists('gettext')) {
	function _($s) {return $s;}
}
?>