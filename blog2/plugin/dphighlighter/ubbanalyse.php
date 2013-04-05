<?php
function plugin_dphighlighter_run($str) { 
  $str=preg_replace("/\s*\[codes=(.+?)\][\n\r]*(.+?)[\n\r]*\[\/codes\]\s*/ie", "makeHighlightcode('\\1', '\\2')", $str);
  return $str;
}
function makeHighlightcode ($type, $str) {
	$str=str_replace("<br/>", "\n" , stripslashes($str));
	return "<textarea name=\"code\" class=\"{$type}\" rows=\"15\" cols=\"100\">{$str}</textarea>";
}
?>