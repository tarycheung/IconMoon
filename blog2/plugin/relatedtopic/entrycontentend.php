<?php
$relatednum=5;
$url_this = "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
$timeformat="Y 年 n 月 j 日";
$time=1;

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
		$allrelates=$blog->getgroupbyquery("SELECT blogid,title,views,blogalias,pubtime,category FROM `{$db_prefix}blogs` WHERE ({$tagforsearch}) AND `property`<2 ORDER BY `pubtime`DESC LIMIT 0,{$relatednum}");
		if (is_array($allrelates)) {
			foreach ($allrelates as $relateditem) {
				if ($relateditem['blogid']==0 || $relateditem['blogid']==$records[0]['blogid']) continue;
				
				$times=($time==1) ? "".gmdate($timeformat, $relateditem['pubtime']+$config['timezone']*3600)."" : '';
				
				$showrelate.="<a href=\"".getlink_entry($relateditem['blogid'], $relateditem['blogalias'])."\" class=\"related-item\">{$relateditem['title']} <span class=\"related-date\"><i class=\"font-icon icon-time\"></i> {$times}</span></a><br/>";
			}
			if ($showrelate) $plugin_return="
<br/><br/>

<div class='textbox-extra '>
	<div class='textbox-extra-title'><i class=\"font-icon icon-asterisk blue\"></i> 分享博文</div>
	<hr>
			<div class=\"ds-share flat\" 
			data-thread-key=\"\" 
			data-title='图月志' 
			data-images=\"http://iconmoon.com/apple-touch-icon-precomposed.png\" 
			data-content='' 
			data-url='$url_this'>
			    <div class=\"ds-share-inline\">
			      <ul  class=\"ds-share-icons-32\">
			      	
			      	<li data-toggle=\"ds-share-icons-more\"><a class=\"ds-more\" href=\"javascript:void(0);\">分享到：</a></li>
			        <a class=\"ds-weibo\" href=\"javascript:void(0);\" data-service=\"weibo\">微博</a>
			        <a class=\"ds-wechat\" href=\"javascript:void(0);\" data-service=\"wechat\">微信</a>
			      	
			      </ul>
			      <div class=\"ds-share-icons-more\"></div>
			    </div>
			 </div>
	<div class='textbox-related'>
	<div class='textbox-extra-title'><i class=\"font-icon icon-asterisk blue\"></i> 相关博文</div>
	<hr>
	{$showrelate}</div>
</div>



	<div class='clear'></div>
";
		}
	}
}

?>