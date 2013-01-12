<?php
if (!defined('VALIDREQUEST')) die ('Access Denied.');
define('customiphonetemplate', 'iphonev1');

function plugin_iphone_firstheader ($str) {
	global $customtemplate;
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')!==false && strpos($_SERVER['HTTP_USER_AGENT'], 'AppleWebKit')!==false) {
		if($_COOKIE['blogtemplate']!=customiphonetemplate) {
			setcookie('blogtemplate', customiphonetemplate);
			header("Location: ./index.php");
			exit();
		}
	}
	return $str;
}

?>