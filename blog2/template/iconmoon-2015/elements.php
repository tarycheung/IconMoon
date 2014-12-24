<?PHP
$elements['header']=<<<eot
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8" id="blog-html">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="UTF-8" />
		<meta content="all" name="robots" />
		<meta name="author" content="JJ Ying" />
		<meta name="description" content="图月志，界面设计个人博客，博主 JJ Ying 是百度 MUX 上海团队的负责人" />
		{baseurl}
		<title>{pagetitle} 图月志 // JJ Ying 的界面设计博客</title>
		<link rel="alternate" type="application/rss+xml" title="图月志" href="http://feed.feedsky.com/yingjunjiu" />
		<link rel="stylesheet" rev="stylesheet" href="../../../blog.css" type="text/css" media="all" />
		<link rel="stylesheet" rev="stylesheet" href="../../../font-icon.css" type="text/css" media="all" />
		<link rel="shortcut icon" HREF="favicon.ico">
		<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
		<script src='../js/nprogress.js'></script>
		<script type="text/javascript" src="../js/waypoints.min.js"></script>
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> 
		<script type="text/javascript" src="//use.typekit.net/dvo8acq.js"></script>-->
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		{ajax_js}
		{extraheader}
	</head>
	
<body id="{pageID}" class="blog">
<a name="top"></a>
eot;



$elements['displayheader']=<<<eot
<div id="header-mask"></div>

		<div id="header">
			<div id="inner-header">

				<div id="logo">
					<a href="../blog2" class="logo" title="图月志首页"><h1><strong>图月志</strong>// JJ Ying 的界面设计博客</h1></a>
				</div>

				<div id="nav">
					<ul>
						<li><a href="category/webpick-chn/" title="关于设计" class="nav-webpick"><i class="font-icon icon-quotes-alt"></i>设计网摘</a></li>
						<li><a href="category/tutorials-chn/" title="原创以及转载的设计教程和心得" class="nav-tutorial"><i class="font-icon icon-flag-alt"></i>理论教程</a></li>
						<li><a href="category/travel-photography/" title="游记、攻略加摄影" class="nav-travel"><i class="font-icon icon-map-marker-alt"></i>摄影旅游</a></li>
						<li><a href="category/diary-chn/" title="生活中的点滴" class="nav-diary"><i class="font-icon icon-pencil-alt"></i>生活日记</a></li>
						<li><a href="category/fun/" title="有趣的视频、图片、文章分享" class="nav-fun"><i class="font-icon icon-idea-alt"></i>娱乐分享</a></li>
						<li><a href="category/works-chn/" title="我的 GUI 作品" class="nav-works"><i class="font-icon icon-screen-alt"></i>个人作品</a></li>
						<li class="mobile-hide"><a href="../about" title="关于 JJ Ying" class="nav-about"><i class="font-icon icon-star-alt"></i>关于博主</a></li>
					</ul>
				</div>
			</div>
		</div>

<div id="wrapper">
	
	<div id="innerWrapper">


		


eot;

$elements['mainpage']=<<<eot
		<div id="mainWrapper">
			<div id="content">
				<div id="innerContent">
					{mainpart}
					<div class="article-bottom" style="display: {ifbottompage}">
						<div class="pages" align="center">
							{pagebar}
						</div>
					</div>
				</div>		
			</div>
eot;

$elements['displayside']=<<<eot
		<div id="sidebar" class="sidebar">
			<div id="innerSidebar">

<div id='blog-side-cate' class="panel"> 
	<div class="panel-content">

	</div> 
</div>
<div class="clear"></div>
<div id='blog-side-about'>
	图月志，界面设计个人博客，博主 <a href="../about" title="关于我">JJ Ying</a> 是<a href="http://mux.baidu.com">百度 MUX</a> 上海团队的负责人，平时经常出没于<a href="http://www.zhihu.com/people/jjying" title="我的知乎页面">知乎</a>、<a href="http://weibo.com/yingjunjiu/" title="我的新浪微博">新浪微博</a>和 <a href="http://dribbble.com/players/JJYing" title="我的 Dribbble 页面">Dribbble</a> 。<br/><br/>浏览过往博文请移步<a href="archive.php">历史热文榜</a>，本博客所有内容若需转载请<a href="mailto:ying.jun.jiu@gmail.com" title="我的电子邮件">联系我</a>。<br/><br/>订阅图月志：<a href="http://pic.yupoo.com/yingjunjiu_v/DI8qiPwg/WUeB.jpg">微信</a> / <a href="http://eepurl.com/GR6Gv">E-mail</a> / <a href="http://feed.feedsky.com/yingjunjiu">RSS</a>
</div>

<div class="clear"></div>

				{section_side_components}


			</div>
		</div>
eot;

$elements['otherpage']=<<<eot
		<div id="mainWrapper">
			<div id="content">
				<div id="innerContent">
					<div class="formbox">
						{mainpart}
					</div>
				</div>
			</div>
eot;

$url_this = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
eot;

$elements['displayfooter']=<<<eot
	</div><div class="clear"></div>
	<div id="footer">
		<div id="inner-footer">
				<span class="footer-nav">
				<a href="http://jjying.com" title="关于我">关于我</a>
				<a href="http://weibo.com/yingjunjiu/" title="我的微博">微博</a>
				<a href="http://www.zhihu.com/people/jjying" title="我的知乎">知乎</a>
				<a href="http://www.xiami.com/u/89583" title="我的虾米">虾米</a>
				<a href="http://www.douban.com/people/JJ.Ying/" title="我的豆瓣">豆瓣</a>
				<a href="http://dribbble.com/players/JJYing" title="我的 Dribbble">Dribbble</a>
				<a href="https://www.behance.net/jjying" title="我的 Behance">Behance</a>
				<a href="https://twitter.com/JJYing" title="我的照片">Twitter</a>
				<a href="http://instagram.com/jjying" title="我的照片">Instagram</a>
				<a href="http://www.flickr.com/photos/jjying/" title="我的照片">Flickr</a>
				<a href="http://jjying.me" title="我的在线收藏夹">Tumblr</a>
				<a href="http://www.linkedin.com/in/jjying/zh-cn" title="我的简历">Linkedin</a>
				<a href="https://github.com/JJYing" title="我的 GitHub">GitHub</a>
			<br />
			<i class="font-icon icon-asterisk blue"></i>
			<br />
			</span>
			© 2014 <strong>JJ Ying</strong>. All rights reserved.  Powered by <a href="http://bo-blog.com/" title="Bo-Blog 2, a free-of-charge weblog engine based on PHP script and MySQL storage."><strong>Bo-Blog</strong></a>.
		</div>
	</div>
</div>
</div>

<!-- Loading Bar -->
<script>
	NProgress.start();
	document.onreadystatechange=function(){ 
		if(document.readyState=="complete"){ 
		        setTimeout(function() { NProgress.done();  }, 500);
		    } 
	} 
</script>

<!-- Keyboard Navigation-->
<script type="text/javascript">
	window.onkeydown = function (e) {
	    var code = e.keyCode ? e.keyCode : e.which;
	    if (code === 37) { 
	        var nextExists = $('.page-previous').attr('href');
	        if (nextExists) window.location.href = $('.page-previous').attr("href");
	    } else if (code === 39) {
	        var nextExists = $('.page-next').attr('href');
	        if (nextExists) window.location.href = $('.page-next').attr("href");
	    }
	};
</script>


<!-- Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-568739-7");
pageTracker._trackPageview();
} catch(err) {}</script>

<!-- Baidu Analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9595aadfac9865133fc81fd7d9c01c35' type='text/javascript'%3E%3C/script%3E"));
</script>

<!-- Header Shadow -->
<script type="text/javascript">
$(function() {
		if ($(window).scrollTop() > 50) {
		  	$('#header').addClass('bar-shadow');
		}
		else {
		  	$('#header').removeClass('bar-shadow');
		}
	    setTimeout(arguments.callee, 40);
});

</script>


eot;


$elements['footer']=<<<eot
<script type="text/javascript">
loadSidebar();
</script>
</body>
</html>
eot;

$elements['displayall']=<<<eot
{headerhtml}
{headmenu}
{bodymenu}
{sidemenu}
{footmenu}
{footerhtml}
eot;

$elements['msgbox']=<<<eot
<div class="tips">Tips:<br/>{message}</div>
eot;

$elements['sideblock']=<<<eot



<div class="panel" id="sidebar_{id}">
<h5><i class="font-icon icon-asterisk blue"></i> {title}</h5>
<div class="panel-content"  style="display: {ifextend}">
{content}
</div>
</div>
eot;

$elements['sideblock_category']=<<<eot
<div id='panelCategory' class="panel">
<h5 >{title}</h5>
<div class="panel-content" id="sideblock_category" style="display: {ifextend}">
{content}
</div>
</div>
eot;

$elements['displaybody']=<<<eot
<div id="sidebar" class="sidebar">
<div id="innerSidebar">
{section_side_components}
</div>
</div>
eot;

$elements['excerpt']=<<<eot
<div class="textbox {entrycatealias}">
	<div class="textbox-title" style="width: 100%;">
		<h2>
			{entrytitle}
		</h2>
		<div class="title-label">{entrydatem} 月 {entrydated} 日 &#8226; {entrydatey} 年  &#8226; <span class="entry-cate">{entrycate}</span><span class="textbox-adminbar">{ifadmin}</span></div>
	</div>
	<div class="textbox-content">{entrycontent}</div>
	<div class="sep"></div>
	
</div>
eot;

$elements['excerptontop']=<<<eot
<div class="textbox">
<div class="textbox-title-top" style="width: 100%;">
			<h2>
			<a href="javascript: showhidediv('{topid}');">+ {entrytitletext}</a>
			</h2>
			<div class="title-label">
							{entrydatem} 月 {entrydated} 日 &#8226; {entrydatey} 年  &#8226; <span class="entry-cate">{entrycate}</span> &#8226; {entrycomment}<span class="textbox-adminbar">{ifadmin}</span>
			</div>
  </div>
	<div id="{topid}" style="display: none;">
	
	<div class="textbox-content">
		{entrycontent}
	</div>
	<div class="sep"></div>
	</div>
</div>
eot;

$elements['list']=<<<eot
	<tr>
		<td class="listbox-entry">
			{entrytitle}
		</td>
	</tr>
eot;

$elements['listbody']=<<<eot
<div class="listbox">
	<div class="listbox-table">
	<table cellpadding="2" cellspacing="0" width="100%">
	{listbody}
	</table>
	</div>
</div>
eot;

$elements['viewentry']=<<<eot
<div class="textbox {entrycatealias}">
	<div class="textbox-title" style="width: 100%;">
		<h2>
			{entrytitle}
		</h2>
		<div class="title-label">
			 {entrydatem} 月 {entrydated} 日 &#8226; {entrydatey} 年 &#8226; <span class="entry-cate">{entrycate}</span><!-- &#8226; {entrycomment}--><span class="textbox-adminbar">{ifadmin}</span>
		</div>			
	</div>
	<div class="textbox-content textbox-content-single">
		{entrycontent}
		<div class="clear"></div>
	</div>
	</div>
<div class="box">
<div class="inner-box">
<div id="commentWrapper" class="comment-wrapper">	
	<a name="topreply"></a>

<a name="comments"></a>
<div class='textbox-extra-title'><i class="font-icon icon-asterisk blue"></i> 博文评论</div>
<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread"></div>
	<script type="text/javascript">
	var duoshuoQuery = {short_name: "iconmoon"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- Duoshuo Comment END -->

eot;

$elements['comment']=<<<eot


eot;

$elements['trackback']=<<<eot
	<div class="trackbackbox">
			<div class="trackbackbox-title">
				<img src="{$template['images']}/trackback.gif" alt="" title="{$lnc[60]}"/> {tbtitle} 
				<div class="trackbackbox-label">
					[{tbtime}] {delreply}
			</div>
		</div>
		<div class="trackbackbox-content">
		 {$lnc[240]}<a href="{tburl}" target="_blank">{tbblogname}</a><br/>
		 {$lnc[76]}{tbcontent}
		</div>
	</div>
eot;


$elements['form_reply']=<<<eot


	<div id="commentForm" >
	<a name="reply"></a>
	</div> 

	</div>
</div>
eot;

$elements['endviewentry']=<<<eot
	<div class="comment-pages">
	{innerpages}
	</div>
</div>
{form_reply}
eot;

$elements['entryadditional']=<<<eot
<div class="blog-readmore">{readmore}</div>
eot;

$elements['login']=<<<eot
<form name="register" method="post" action="login.php?job=verify">
<div class="title-labe">
<table cellspacing="1" width="500px" align="center" class="formbox">
  <tr><td class="formbox-title" colspan="2">Login(<a href="login.php?job=register">Not Registered?</a>)</td></tr>
  <tr>
    <td class="formbox-rowheader">Username</td>
    <td class="formbox-content"><input name="username" type="text" id="username" size="24" class="text" />
  </tr>
  <tr>
    <td class="formbox-rowheader">Password</td>
    <td class="formbox-content"><input name="password" type="password" id="password" size="16" class="text" />
  </tr>
  <tr>
    <td class="formbox-rowheader">{$lnc[255]}</td>
    <td class="formbox-content"><input name="savecookie" type="radio" id="savecookie" value="0"/>{$lnc[256]} <input name="savecookie" type="radio" id="savecookie" value="3600"/>{$lnc[257]} <input name="savecookie" type="radio" id="savecookie" value="86400"/>{$lnc[258]}  <input name="savecookie" type="radio" id="savecookie" value="604800"/>{$lnc[259]}  <input name="savecookie" type="radio" id="savecookie" value="2592000"/>{$lnc[260]}   <input name="savecookie" type="radio" id="savecookie" value="31104000"/>{$lnc[261]}   
  </tr>
  {lvstart}
  <tr>
    <td class="formbox-rowheader">{$lnc[249]}</td>
    <td class="formbox-content"><img src="inc/securitycode.php?rand={rand}" alt="" title="{$lnc[250]}"/> <input name="securitycode" type="text" id="securitycode" size="16" class="text" /> {$lnc[251]}
  </tr>
  {lvend}
  <tr>
    <td class="formbox-content"></td>
    <td class="formbox-content">
    <input name="Submit" type="submit" id="Submit" value="Submit" class="button" /> &nbsp;
    <input name="Reset" type="reset" id="Reset" value="Reset" class="button" />
    </td>
  </tr>
</table>
</div>
</form>
eot;

$elements['contentpage']=<<<eot
<div class="textbox">
	<div class="textbox-title">
			<h2>
				{title}
			</h2>
  </div>
	<div class="textbox-content">
	{contentbody}
	</div>
</div>
eot;

$elements['taglist']=<<<eot
<table width="98%" align="center" cellpadding="4" cellspacing="0">
<tr><td>{tagcategory}</td></tr>
<tr><td class="taglist" style="word-break: none; word-wrap: break-word;">{tagcontent}</td></tr>
<tr><td>{tagextra}</td></tr>
</table>
<br/><br/>
eot;

$elements['register']=<<<eot
<form name="register" method="post" action="{job}">
<table cellspacing="1" width="500px" align="center" class="formbox">
  <tr><td class="formbox-title" colspan="2">{title} </td></tr>
  {registerbody}
  <tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button"/> </td></tr>
</table>
</form>
eot;

$elements['normaltable']=<<<eot
<table cellspacing="0" width="500px" align="center" class="formbox">
  {tablebody}
</table>
eot;

$elements['normaltablewithtitle']=<<<eot
<table cellspacing="0" width="500px" align="center" class="formbox">
  <tr><td class="formbox-title" colspan="6">{title}</td></tr>
  {tablebody}
</table>
eot;

$elements['form_eachline']=<<<eot
  <tr>
    <td class="formbox-rowheader">{text}</td>
    <td class="formbox-content">{formelement}</td>
  </tr>
eot;

$elements['eachlink']=<<<eot
<div class="linkbody">
<div class="linktxt"><span class="linktitle">{title}</span><span class="linkdesc">{desc}</span></div>
</div>
eot;

$elements['linkdiv']=<<<eot
<div class="linkover">
<div class="linkgroup">{title}</div>
<hr>
<div class="linkgroupcontent">{tablebody}</div>
</div>
eot;

$elements['viewpage']=<<<eot
<div class="pagebox">
	<div class="pagebox-title">
		<h2>
		{entrytitle}
		</h2>
	</div>
	<div class="pagebox-content">
		{entrycontent}
	</div>
</div>
eot;


//Message page
$elements['tips']=<<<eot
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="UTF-8" />
<link rel="stylesheet" rev="stylesheet" href="../../../styles.css" type="text/css" media="all" />
<link rel="stylesheet" rev="stylesheet" href="../blog2/admin/theme/iconmoon/common.css" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:light,regular,bold' rel='stylesheet' type='text/css'/>
<title>{blogname} - {blogdesc}</title>
<script type="text/javascript" src="images/js/common.js"></script>
</head>
<body id="messagebox">
<center>
<div class="messagebox textbox">
  <h3>{title}</h3>
   <hr>
  <div class="messagebox-content">
  {tips}
  </div>
  <hr>
  <div class="messagebox-bottom"><a href="javascript: window.history.back();">{$lnc[263]}</a> | <a href="index.php">{$lnc[88]}</a> {admin_plus}</div>
</div>
</center>
</div>
</body>
</html>
eot;
?>