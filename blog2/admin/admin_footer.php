<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');
$display_overall.="</div></div>
<div id=\"adminfooter\"><div id=\"copyright\"><acronym title='{$codeversion}'> <u>V{$blogversion}</u></acronym> [<a href=\"login.php?job=logout\">{$lna[40]}</a>] </div></div>

<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-568739-12']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body></html>";
@header("Content-Type: text/html; charset=utf-8");
echo ($display_overall);