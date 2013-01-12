<?php
$relatednum=5;
$url_this = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];


if (!defined('VALIDREQUEST')) die ('Access Denied.');



global $records, $blog, $db_prefix;
if ($records[0]['tags'] && $records[0]['tags']!='>') {
	$records[0]['tags']=trim($records[0]['tags'],'>');
	$taginfo=@explode('>', $records[0]['tags']);
}

$plugin_return='';
if (is_array($taginfo)) {
	$tagforsearch=makeaquery($taginfo, "`tagname`='%s'", 'OR');
	$allrelates=$blog->getarraybyquery("SELECT tagentry FROM `{$db_prefix}tags` WHERE {$tagforsearch}");
	$alllse=@implode(',', $allrelates['tagentry']);
	$allsingle=array_unique(@explode(',', $alllse));
	if (is_array($allsingle)) {
		$tagforsearch=makeaquery($allsingle, "`blogid`='%s'", 'OR');
		$allrelates=$blog->getgroupbyquery("SELECT blogid,title,views,blogalias FROM `{$db_prefix}blogs` WHERE ({$tagforsearch}) AND `property`<2 ORDER BY `pubtime`DESC LIMIT 0,{$relatednum}");
		if (is_array($allrelates)) {
			foreach ($allrelates as $relateditem) {
				if ($relateditem['blogid']==0 || $relateditem['blogid']==$records[0]['blogid']) continue;
				$showrelate.=" &raquo; <a href=\"".getlink_entry($relateditem['blogid'], $relateditem['blogalias'])."\">{$relateditem['title']}</a><br/>";
			}
			if ($showrelate) $plugin_return="<!-- Added by RelatedTopic, plugin for Bo-Blog 2.0.0 -->\r
<br/><br/>
<hr>
<div class='textbox-extra'>
	<div><h6>相关日志:</h6></div>
	<div class='textbox-related'>{$showrelate}</div>

</div>



	<div class='clear'></div>
\r<!-- RelatedTopic over -->";
		}
	}
}

?>