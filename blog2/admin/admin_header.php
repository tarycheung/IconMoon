<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');

include_once("data/cache_adminskinlist.php");

$csslocation="admin/theme/{$currentadminskin}/common.css";
$fonticon="admin/theme/{$currentadminskin}/font-icon.css";
$themename=$currentadminskin;
$adminitemperpage=35;
if (file_exists("lang/{$langback}/tips.php")) include_once("lang/{$langback}/tips.php");
else include_once("admin/tips.php");
$trmd=rand(0,9);
$daytip=$showtips[$trmd];
if ($act=='edit' || $act=='page') {
	acceptrequest('useeditor');
	$useeditor=basename($useeditor);
	if ($useeditor && file_exists("editor/{$useeditor}/editordef.php")) {
		require("editor/{$useeditor}/editordef.php");
	}
	else {
		$useeditor=$mbcon['editortype'];
		require("editor/{$useeditor}/editordef.php");
	}
	$adminclassshow['new']='_active';
}

$adminclassshow[$act]='_active';

$shutajax=($config['closeadminajax']=='1') ? 1 : 0;


$messageblock=($flset['guestbook']!=1) ? "<span class=\"ahb{$adminclassshow['message']}\"><li onmouseover=\"adminitemhover('message',this)\"><a href=\"admin.php?act=message\">{$lna[7]}</a></li></span>" : '';
$display_overall.=<<<eot
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<link REL="SHORTCUT ICON" HREF="favicon.ico">
<link rel="stylesheet" rev="stylesheet" href="{$csslocation}" type="text/css" media="all" />
<link rel="stylesheet" rev="stylesheet" href="{$fonticon}" type="text/css" media="all" />
<title>图月志</title>
$initialjs
<script type="text/javascript" src="lang/{$langback}/jslang.js"></script>
<script type="text/javascript" src="images/js/common.js"></script>
<script type="text/javascript">

//<![CDATA[
var ajaxloadingIMG='admin/theme/{$themename}/ajaxloader.gif';
var shutajax={$shutajax};
//]]>
</script>
<script type="text/javascript" src="images/js/admin.js"></script>
<script type="text/javascript" src="images/js/ajax.js"></script>
<script type="text/javascript" src="images/js/adminmenu.js"></script>
$editorjs
<!--plugin_header-->
</head>
<body{$onloadjs}>
<a name="beginning"></a>
<div id='adminoverall'>
<div id="bloginfo">
<div id="bloginfoimg">

</div>
<div id="bloginfotext">
{$lna[1]} {$daytip}
</div>
</div>
<div id="adminheader">
<div id="admin-link"><a href="category/weblog/">博客首页  »</a></div>
<div id="admin-link" class="admin-link-2"><a href="../index.html">IconMoon  »</a></div>
<div id="adminheader">

<div id="adminheaderbar">
<ul>
<span class="ahb{$adminclassshow['main']}"><li class="firstitem" onmouseover="adminitemhover('main',this)"><a href="admin.php?act=main"><i class="font-icon icon-home-alt"></i> {$lna[2]}</a></li></span>
<span class="ahb{$adminclassshow['new']}"><li onmouseover="adminitemhover('new',this)"><a href="admin.php?act=edit"><i class="font-icon icon-plus-sign"></i> 写新博文</a></li></span>
<span class="ahb{$adminclassshow['entry']}"><li onmouseover="adminitemhover('entry',this)"><a href="admin.php?act=entry"><i class="font-icon icon-pencil-alt"></i> {$lna[3]}</a></li></span>
<span class="ahb{$adminclassshow['category']}"><li onmouseover="adminitemhover('category',this)"><a href="admin.php?act=category"><i class="font-icon icon-folder-sign"></i> {$lna[4]}</a></li></span>
<span class="ahb{$adminclassshow['link']}"><li onmouseover="adminitemhover('link',this)"><a href="admin.php?act=link"><i class="font-icon icon-group-alt"></i> {$lna[5]}</a></li></span>
<span class="ahb{$adminclassshow['addon']}"><li onmouseover="adminitemhover('addon',this)"><a href="admin.php?act=addon"><i class="font-icon icon-idea-alt"></i> {$lna[9]}</a></li></span>
<span class="ahb{$adminclassshow['carecenter']}"><li onmouseover="adminitemhover('carecenter',this)"><a href="admin.php?act=carecenter"><i class="font-icon icon-wrench-alt"></i> {$lna[11]}</a></li></span>
</ul>
</div>
</div>
<div id="dropcontainer"><div id="dropmenudiv" class="dropmenudiv" style="position:absolute;top:-15px;visibility:hidden;z-index:10000"></div></div>
<div id="adminalert" style="display:none;"></div>
<!-- div id='changeBox' class='adminbox-success'>"+ajaxMsg+"</div><div id='divMask' class='adminbox-success-mask'></div -->
eot;

$admin_item["main"]=array("default"=>$lna[12], "config"=>服务器, "mbcon"=>$lna[14], "module"=>$lna[15], "update"=>$lna[16]);

$admin_item["category"]=array("default"=>$lna[4]);
if ($flset['tags']!=1)  $admin_item["category"]["tags"]=$lna[17];

$admin_item["link"]=array("default"=>$lna[18], "detail"=>$lna[19], "groupsorting"=>$lna[252], "add"=>$lna[20]);
$admin_item["entry"]=array();
$admin_item["new"]=array();
$admin_item["reply"]=array("default"=>$lna[6], "censor"=>$lna[24], "tb"=>$lna[25], "tbcensor"=>$lna[947]);

if ($flset['guestbook']!=1) {
	$admin_item["message"]=array("default"=>$lna[7], "censor"=>$lna[26]);
}

$admin_item["addon"]=array("skin"=>$lna[27], "plugin"=>$lna[28], "langspec"=>$lna[1101]);

$admin_item["misc"]=array("forbidden"=>$lna[30], "emot"=>$lna[29]);
if ($flset['weather']!=1)  $admin_item["misc"]["weatherset"]=$lna[31];
if ($flset['avatar']!=1)  $admin_item["misc"]["avatar"]=$lna[32];
$admin_item["misc"]+=array("sessiondir"=>$lna[935], "urlrewrite"=>$lna[527]);

$admin_item["user"]=array("usergroup"=>$lna[33], "users"=>$lna[8], "add"=>$lna[34]);
$admin_item["carecenter"]=array("recache"=>$lna[35], "adminattach"=>$lna[36], "mysql"=>MySQL, "export"=>$lna[37], "import"=>$lna[38],);


foreach ($admin_item as $k=>$v) {
	$rollall='<ul>';
	foreach ($v as $kk=>$vv) {
		$rollall.="<li class=\"normal\"><a href=\"admin.php?go={$k}_{$kk}\">{$vv}</a></li>";
	}
	$rollall.='</ul>';
	$display_overall.="<div id=\"hoveritem_{$k}\" style=\"display: none;\">{$rollall}</div>\n";
}

?>