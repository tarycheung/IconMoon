<?php
if (!defined('VALIDREQUEST')) die ('Access Denied.');
global $replier,$v_content,$v_id;

if($rep_type=='留言'){
	$goto_blog_url=$config['blogurl'].'/guestbook.php';
	$entry_link='留言板';
}
elseif($rep_type=='评论'){
	$entry=$blog->getbyquery("SELECT `title`,`blogalias` FROM `{$db_prefix}blogs` WHERE blogid='{$v_id}'");
	$entry_url=$config['blogurl'].'/'.getlink_entry($v_id,$entry['blogalias']);
	$goto_blog_url=$entry_url;
	$entry_link='《<a href="'.$entry_url.'" target="_blank">'.$entry['title'].'</a>》';
}
else{
	echo '未知的操纵类型';
}
/*---------------------------
下面是邮件里的样式，自行修改
{$replier}是留言者名字，不要修改
--------------------------*/
$mail_body=<<<eot
"{$replier}"在<a href="http://blog.joysboy.net/" target="_blank">小峰网络遨游记</a>的{$entry_link}{$rep_type}了：<br />
=================================================================<br />
<br />
<strong>{$v_content}</strong><br />
<br />
=================================================================<br />

查看本条{$rep_type}详细内容请前往地址：<br />
<a href="{$goto_blog_url}" target="_blank">{$goto_blog_url}</a><br />
<br />
--------------------------------------------------------------------------------<br />
eot;

require 'plugin/pushmail/class.phpmailer.php';
$mail = new PHPMailer ();
$mail->IsSMTP (); 
try {
	$mail->Host = "mail.gmail.com";//这里修改为你邮件服务商的邮件服务器
	$mail->SMTPDebug = 0; 
	$mail->SMTPAuth = true; 
	$mail->CharSet = "UTF-8";
	$mail->SMTPSecure = "ssl";//看你邮件是否支持SSL加密
	$mail->Host = "smtp.gmail.com"; //这里修改为你邮件服务商的SMTP服务器
	$mail->Port = 465;//这里修改为你邮件服务商的SMTP发送端口
	$mail->Username = "abc@joysboy.net";//这里修改为你邮箱用户名
	$mail->Password = "***";//这里修改为你邮箱密码
	$mail->AddReplyTo ( 'no-reply@gmail.com' );//这里修改为你需要的回复地址
	$mail->AddAddress ('zyxfsky@gmail.com');//这里修改为你要接受提醒的邮箱地址
	$mail->SetFrom ( 'zyxfsky@gmail.com' );//这里修改为你要发送提醒的邮箱地址
	$mail->Subject = $replier.'在小峰网络遨游记里'.$rep_type.'了';  //$replier是留言者名字，不要修改，博客名自己修改，或者你喜欢的语句
	$mail->AltBody = '小峰网络遨游记(htp://blog.joysboy.net/),请去小峰网络遨游记查看'; //博客名自己修改，或者你喜欢的语句
	$mail->MsgHTML ($mail_body);
	$mail->Send ();
} catch ( phpmailerException $e ) {
	echo $e->errorMessage (); 
} catch ( Exception $e ) {
	echo $e->getMessage ();
}
?>