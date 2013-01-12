<?php
if (! defined ( 'VALIDADMIN' )) die ( 'Access Denied.' );

if($rep_type=='留言'){
	$msg_info=$blog->getbyquery("SELECT * FROM `{$db_prefix}messages` WHERE `repid`='{$repid}'");
	$poster=$msg_info['replier'];
	$poster_email=$msg_info['repemail'];
	$poster_content=$msg_info['repcontent'];
	$post_time=zhgmdate ("{$mbcon['timeformat']} H:i", ($msg_info['reptime'] + 3600 * $config ['timezone']));
	$goto_blog_url=$config['blogurl'].'/guestbook.php';
	$reply_time=zhgmdate ( "{$mbcon['timeformat']} H:i", ($currenttime + 3600 * $config ['timezone']));
	$entry_link='';
}
elseif($rep_type=='评论'){
	$com_info=$blog->getbyquery("SELECT * FROM `{$db_prefix}replies` WHERE `repid`='{$repid}'");
	$poster=$com_info['replier'];
	$poster_email=$com_info['repemail'];
	$poster_content=$com_info['repcontent'];
	$post_time=zhgmdate ("{$mbcon['timeformat']} H:i", ($com_info['reptime'] + 3600 * $config ['timezone']));
	$entry=$blog->getbyquery("SELECT `title`,`blogalias` FROM `{$db_prefix}blogs` WHERE blogid='".$com_info['blogid']."'");
	$entry_url=$config['blogurl'].'/'.getlink_entry($com_info['blogid'],$entry['blogalias']);
	$goto_blog_url=$entry_url.'#blogcomment'.$repid;
	$reply_time=zhgmdate ( "{$mbcon['timeformat']} H:i", ($currenttime + 3600 * $config ['timezone']));
	$entry_link='<a href="'.$entry_url.'" target="_blank">IconMoon Blog // '.$entry['title'].'</a>';
}
else{
	echo '未知的操纵类型';
}
/*---------------------------
下面是邮件里的样式，自行修改
{$poster}是留言者名字，不要修改
--------------------------*/
$mail_body=<<<eot
Hi, {$poster}<br /><br />
You posted a comment on <strong>{$entry_link}</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br />
<br />
<font  color="666666" size="+2">"{$poster_content}"</font><br />
<br />
<font  color="999999" size="-2">(<em>{$post_time}</em>)</font>
<hr /><br />

JJ.Ying just replied:
<br />
<br />
<font  color="666666" size="+2">"{$adminreplycontent}"</font><br />
<br />
<hr />
<font  color="999999" size="-2">To view the details of the post, please go to:<br />
<a href="{$goto_blog_url}" target="_blank">{$goto_blog_url}</a><br />
<br />
Reply notification of <strong>IconMoon</strong></font>
<br /><br />
<br />

eot;
require 'plugin/pushmail/class.phpmailer.php';
$mail = new PHPMailer ();
$mail->IsSMTP (); 
try {
	$mail->Hostname = "mail.gmail.com";
	$mail->SMTPDebug = 0; 
	$mail->SMTPAuth = true; 
	$mail->CharSet = "UTF-8";
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com"; 
	$mail->Port = 465;                
	$mail->Username = "junjiu.ying@gmail.com";//这里修改为您的邮箱用户名
	$mail->Password = "!QAZ2wsx3edc";             //这里修改为你邮箱密码
	$mail->AddReplyTo ( 'ying.jun.jiu@gmail.com' );//这里修改为你需要的回复地址
	$mail->AddAddress ($poster_email);
	$mail->SetFrom ( 'ying.jun.jiu@gmail.com' );//这里修改为你要发送提醒的邮箱地址，三个邮箱地址一样就可以了
	$mail->Subject = "Hi, you have a reply on IconMoon Blog";
	$mail->AltBody = "IconMoon"; //这里可修改成您自己的提示 
	$mail->MsgHTML ($mail_body);
	$mail->Send ();
	echo "<table align=center>";
	echo "<tr><td >Reply has been sent to <b>{$poster_email}</b></td></tr>";
	echo "</table>";	
} catch ( phpmailerException $e ) {
	echo $e->errorMessage (); 
} catch ( Exception $e ) {
	echo $e->getMessage ();
}
?>