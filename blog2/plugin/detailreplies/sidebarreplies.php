<?php

if (!defined('VALIDREQUEST')) die ('Access Denied.');
global $listrepliesitem, $replies_list, $config;
if ($listrepliesitem) {
	$replies_list="<ul>";
	for ($i=0; $i<count($listrepliesitem); $i++) {
		$addintionalcssclass=($i%2==0) ? 'rowcouple' : 'rowodd';
		$listrepliesitems=$listrepliesitem[$i];
		$listrepliesitems['replier']=substr($listrepliesitems['replier'], 0, 20);
		$replies_list.="<li class='{$addintionalcssclass}'><a href=\"".getlink_entry($listrepliesitems['blogid'], $listrepliesitems['blogalias'])."#blogcomment{$listrepliesitems['repid']}\" title=\"Re: {$listrepliesitems['title']}\"><strong>{$listrepliesitems['replier']}</strong></a>: {$listrepliesitems['repcontent']}</li>";
	}
	$replies_list.="</ul>";
}

?>