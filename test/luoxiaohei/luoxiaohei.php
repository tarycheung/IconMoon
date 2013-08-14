<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta content="all" name="robots" />
	<meta name="author" content="JJ Ying" />
	<meta name="description" content="羅小黑爭奪戰 Alpha" />
	<title>羅小黑爭奪戰 Alpha</title>
    <link rel="stylesheet" href="luoxiaohei.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<input type="text" name="content1" id="xxx" class="content" value="" size="50" />
		<input type='submit' name='send' class="submit" id="" value='' onclick='zzz()' />
	</div>


<script language="javascript">
 function zzz()
 {
 	var value=getElement("xxx").value;
 
 	if(value == "coins")
 	{
        self.location="221.php";
 	}else{
	 		alert("很遗憾，您的答案 "+value+" 不正确。。。");
 	}
 }
 
function getElement (id) {

  if (document.getElementById) {
    return document.getElementById(id);
  }

  else if (document.all) {
    return window.document.all[id];
  }

  else if (document.layers) {
    return window.document.layers[id];
  }
}
</script>


<!-- Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-568739-7");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>