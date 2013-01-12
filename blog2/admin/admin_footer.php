<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');
$display_overall.="</div></div>
<div id=\"adminfooter\"><div id=\"copyright\"><acronym title='{$codeversion}'> <u>V{$blogversion}</u></acronym> [<a href=\"login.php?job=logout\">{$lna[40]}</a>] </div></div>



</body></html>";
@header("Content-Type: text/html; charset=utf-8");
echo ($display_overall);