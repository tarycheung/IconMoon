<?PHP
/* -----------------------------------------------------
Bo-Blog 2 : The Blog Reloaded.
<<A Bluview Technology Product>>
禁止使用Windows记事本修改文件，由此造成的一切使用不正常恕不解答！
PHP+MySQL blog system.
Code: Bob Shen
Offical site: http://www.bo-blog.com
Copyright (c) Bob Shen 中国－上海
In memory of my university life
------------------------------------------------------- */

if (!defined('VALIDREQUEST')) die ('Access Denied.');

if ($job=='user') {
	checkpermission('ViewUserDetail');
	include_once("data/cache_usergroup.php");
	if ($itemid==='') catcherror ($lnc[193]);
	$nowuser=$blog->getbyquery("SELECT * FROM `{$db_prefix}user` WHERE `userid`='$itemid'");
	if (!$nowuser) catcherror ($lnc[193]);
	$usergp_tmp=$nowuser['usergroup'];
	$tmp_gender=$nowuser['gender'];
	$nowuser['email']=(trim($nowuser['email'])=='') ? $lnc[141] : "<a href=\"mailto:{$nowuser['email']}\">{$lnc[18]}</a>";
	$nowuser['homepage']=(trim($nowuser['homepage'])=='') ? $lnc[141] : "<a href=\"{$nowuser['homepage']}\" target=\"_blank\">{$lnc[19]}</a>";

	$t=new template;
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[132], 'formelement'=>$nowuser['username']." &nbsp; [".$usergp[$usergp_tmp]."]"));
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[139], 'formelement'=>$nowuser['email']));
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[140], 'formelement'=>$nowuser['homepage']));
	$sex_sel=array('0'=>$lnc[141], '1'=>$lnc[142], '2'=>$lnc[143]);
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[144], 'formelement'=>$sex_sel[$tmp_gender]));
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[145], 'formelement'=>stripslashes($nowuser['qq'])));
	$formbody.=$t->set('form_eachline', array('text'=>'MSN', 'formelement'=>stripslashes($nowuser['msn'])));
	$formbody.=$t->set('form_eachline', array('text'=>'Skype', 'formelement'=>stripslashes($nowuser['skype'])));
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[146], 'formelement'=>stripslashes($nowuser['fromplace'])));
	$formbody.=$t->set('form_eachline', array('text'=>$lnc[147], 'formelement'=>stripslashes($nowuser['intro'])));
	$section_table=$t->set('normaltable', array('tablebody'=>$formbody));
	$section_body_main=$t->set('contentpage', array('title'=>$lnc[194], 'contentbody'=>$section_table));
	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>'', 'iftoppage'=>'none', 'ifbottompage'=>'none',  'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>$section_body_main, 'currentpage'=>'', 'previouspageurl'=>'', 'nextpageurl'=>'', 'turningpages'=>'', 'totalpages'=>'', 'previouspageexists'=>'', 'nextpageexists'=>''));
}

if ($job=='links') {
	$t=new template;
	$linkgp=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}linkgroup` ORDER BY `linkgporder`");
	$links=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}links` ORDER BY `linkorder`");
	if ($links && is_array($links)) {
		$mbcon['linkperpage']=($mbcon['linkperpage']>0) ? floor($mbcon['linkperpage']) : 2;
		$linkeachcloumn=floor(100/$mbcon['linkperpage']).'%';
		$rowcount=array();
		foreach ($links as $linkeachitem) {
			unset ($tmp_gp, $tmp_displayitem);
			$tmp_gp=$linkeachitem['linkgptoid'];
			if ($linkeachitem['linklogo']) $displayitemlogo="<img src=\"{$linkeachitem['linklogo']}\" alt=\"{$linkeachitem['linkname']}\" border=\"0\" />";
			else $displayitemlogo='';
			if (empty($rowcount[$tmp_gp])) {
				$rowcount[$tmp_gp]=1;
				$alllinks[$tmp_gp].="<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
			}
			if ($rowcount[$tmp_gp]%$mbcon['linkperpage']==1) $alllinks[$tmp_gp].="<tr valign=\"top\">";
			$alllinks[$tmp_gp].="<td width=\"{$linkeachcloumn}\">\n";
			$alllinks[$tmp_gp].=$t->set('eachlink', array('logo'=>$displayitemlogo, 'title'=>"<a href=\"{$linkeachitem['linkurl']}\" target=\"_blank\">{$linkeachitem['linkname']}</a>", 'desc'=>$linkeachitem['linkdesc']));
			$alllinks[$tmp_gp].="</td>\n";
			if ($rowcount[$tmp_gp]%$mbcon['linkperpage']==0) $alllinks[$tmp_gp].="</tr>";
			$rowcount[$tmp_gp]+=1;
		}
	}

	if ($linkgp && is_array($linkgp)) {
		foreach ($linkgp as $linkgpeachitem) {
			unset ($tmp_gp);
			$tmp_gp=$linkgpeachitem['linkgpid'];
			$alllinks[$tmp_gp].=($alllinks[$tmp_gp]) ?  '</table>' : '';
			$displaygp[$tmp_gp]=$t->set('linkdiv', array('title'=>$linkgpeachitem['linkgpname'], 'tablebody'=>$alllinks[$tmp_gp]));
		}
	} else {
		$displaygp[]=$lnc[195];
	}
	$section_table=@implode('', $displaygp);
	$section_body_main=$t->set('contentpage', array('title'=>$lnc[94], 'contentbody'=>$section_table));
	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>'', 'iftoppage'=>'none', 'ifbottompage'=>'none',  'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>$section_body_main, 'currentpage'=>'', 'previouspageurl'=>'', 'nextpageurl'=>'', 'turningpages'=>'', 'totalpages'=>'', 'previouspageexists'=>'', 'nextpageexists'=>''));
}

if ($job=='comment') {
	$start_id=($page-1)*$mbcon['replyperpage'];
	$records=$blog->getgroupbyquery("SELECT t1.*, t2.title, t2.blogalias FROM `{$db_prefix}replies` t1 INNER JOIN `{$db_prefix}blogs` t2 ON t2.blogid=t1.blogid WHERE t1.reproperty<=1 AND t2.property<2 ORDER BY t1.reptime DESC LIMIT {$start_id}, {$mbcon['replyperpage']}");
	for ($i=0; $i<count($records); $i++) {
		$records[$i]['repcontent']="<strong>{$lnc[71]}</strong><a href=\"".getlink_entry($records[$i]['blogid'], $records[$i]['blogalias'])."\">{$records[$i]['title']}</a><br/><strong>{$lnc[76]}</strong>".$records[$i]['repcontent'];
	}
	$m_b=new getblogs;
	if (is_array($records)) {
		$section_body_main[]=$m_b->make_replies($records);
		$innerpages=$m_b->make_pagebar ($page, $mbcon['pagebaritems'], "view.php?go=comment", $statistics['replies'], $mbcon['replyperpage']);
	}

	$iftoppage=($mbcon['pagebarposition']=='down') ? 'none' : 'block';
	$ifbottompage=($mbcon['pagebarposition']=='up') ? 'none' : 'block';

	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>$innerpages, 'iftoppage'=>$iftoppage, 'ifbottompage'=>$ifbottompage, 'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>@implode('', $section_body_main), 'currentpage'=>$pageitems['currentpage'], 'previouspageurl'=>$pageitems['previouspageurl'], 'nextpageurl'=>$pageitems['nextpageurl'], 'turningpages'=>$pageitems['turningpages'], 'totalpages'=>$pageitems['totalpages'], 'previouspageexists'=>$pageitems['previouspageexists'], 'nextpageexists'=>$pageitems['nextpageexists']));
	$pagetitle="{$lnc[196]} // ";
}

if ($job=='tb') {
	$start_id=($page-1)*$mbcon['replyperpage'];
	$records=$blog->getgroupbyquery("SELECT t1.*, t2.title, t2.blogalias FROM `{$db_prefix}replies` t1 INNER JOIN `{$db_prefix}blogs` t2 ON t2.blogid=t1.blogid WHERE t1.reproperty='4' ORDER BY t1.reptime DESC LIMIT {$start_id}, {$mbcon['replyperpage']}");
	for ($i=0; $i<count($records); $i++) {
		$records[$i]['repemail']="{$lnc[197]} <a href=\"".getlink_entry($records[$i]['blogid'], $records[$i]['blogalias'])."\">{$records[$i]['title']}</a>";
	}
	$m_b=new getblogs;
	if (is_array($records)) {
		$section_body_main[]=$m_b->make_replies($records);
		$innerpages=$m_b->make_pagebar ($page, $mbcon['pagebaritems'], "view.php?go=tb", $statistics['tb'], $mbcon['replyperpage']);
	}

	$iftoppage=($mbcon['pagebarposition']=='down') ? 'none' : 'block';
	$ifbottompage=($mbcon['pagebarposition']=='up') ? 'none' : 'block';

	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>$innerpages, 'iftoppage'=>$iftoppage, 'ifbottompage'=>$ifbottompage, 'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>@implode('', $section_body_main), 'currentpage'=>$pageitems['currentpage'], 'previouspageurl'=>$pageitems['previouspageurl'], 'nextpageurl'=>$pageitems['nextpageurl'], 'turningpages'=>$pageitems['turningpages'], 'totalpages'=>$pageitems['totalpages'], 'previouspageexists'=>$pageitems['previouspageexists'], 'nextpageexists'=>$pageitems['nextpageexists']));
	$pagetitle="{$lnc[198]} // ";
}

if ($job=='userlist') {
	checkpermission('ViewUserList');
	acceptrequest('usergroup,ordered');
	include_once("data/cache_usergroup.php");
	$queryplus=($usergroup==="") ? '' : "WHERE `usergroup`='{$usergroup}'";
	if ($ordered!=='') {
		$allorder=array('`username` ASC', '`username` ASC', '`username` DESC', '`regtime` DESC', '`regtime` ASC');
		$ordernow=$allorder[$ordered];
	} else $ordernow='`username` ASC';
	$start_id=($page-1)*$mbcon['listitemperpage'];
	$detail_array=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}user` {$queryplus}  ORDER BY {$ordernow} LIMIT $start_id, {$mbcon['listitemperpage']}");
	for ($i=0; $i<count($detail_array); $i++) {
		$tmp_gp=$detail_array[$i]['usergroup'];
		$tmp_sgp=$usergp[$tmp_gp];
		$tmp_tm=zhgmdate("{$mbcon['timeformat']} H:i", $detail_array[$i]['regtime']+3600*$config['timezone']);
		$tablebody.="<tr><td width='42%' class=\"listbox-entry\">{$detail_array[$i]['username']}</td><td width='10%'  align='center' class=\"listbox-entry\">{$tmp_sgp}</td><td width='40%' align='center' class=\"listbox-entry\">{$tmp_tm}</td><td width='5%' align='center' class=\"listbox-entry\"><a href=\"".getlink_user($detail_array[$i]['userid'])."\"><img src='{$mbcon['images']}/detail.gif' alt='{$lnc[194]}' title='{$lnc[194]}' border='0'></a></td></tr>\n";
	}
	$tablelist="<tr><td class=\"listbox-header\" width='42%' align='center'>{$lnc[132]}</td><td class=\"listbox-header\" width='13%'  align='center'>{$lnc[199]}</td><td class=\"listbox-header\" width='40%' align='center'>{$lnc[200]}</td><td class=\"listbox-header\" width='5%' align='center'></td></tr>\n".$tablebody;
	foreach ($usergp as $i=>$value) {
		if ($i==0) continue;
		
		$selected=($i==$usergroup) ? ' selected="selected"' : '';
		$puttingcate[]="<a href=\"view.php?go=userlist&amp;usergroup={$i}&amp;ordered={$ordered}\">{$value}</a>";
	}
	$puttingcates="{$lnc[201]} <a href=\"view.php?go=userlist&amp;ordered={$ordered}\">{$lnc[202]}</a> | ".@implode(' | ', $puttingcate); 
	$tablelist.="<tr><td colspan='5' align='left'></td></tr>\n";

	$m_b=new getblogs;

	$innerpages=$m_b->make_pagebar ($page, $mbcon['pagebaritems'], "view.php?go=userlist", $statistics['users']+1, $mbcon['listitemperpage']);

	$innerpages.="<br/>{$puttingcates}<br/> {$lnc[203]} <a href=\"view.php?go=userlist&amp;usergroup={$usergroup}&amp;ordered=1\">{$lnc[204]}</a> | <a href=\"view.php?go=userlist&amp;usergroup={$usergroup}&amp;ordered=2\">{$lnc[205]}</a> | <a href=\"view.php?go=userlist&amp;usergroup={$usergroup}&amp;ordered=3\">{$lnc[206]}</a> | <a href=\"view.php?go=userlist&amp;usergroup={$usergroup}&amp;ordered=4\">{$lnc[207]}</a>";

	$iftoppage=($mbcon['pagebarposition']=='down') ? 'none' : 'block';
	$ifbottompage=($mbcon['pagebarposition']=='up') ? 'none' : 'block';

	$section_table=$t->set('normaltable', array('tablebody'=>$tablelist));
	$section_body_main=$t->set('contentpage', array('title'=>$lnc[208], 'contentbody'=>$section_table));
	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>$innerpages, 'iftoppage'=>$iftoppage, 'ifbottompage'=>$ifbottompage, 'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>$section_body_main, 'currentpage'=>$pageitems['currentpage'], 'previouspageurl'=>$pageitems['previouspageurl'], 'nextpageurl'=>$pageitems['nextpageurl'], 'turningpages'=>$pageitems['turningpages'], 'totalpages'=>$pageitems['totalpages'], 'previouspageexists'=>$pageitems['previouspageexists'], 'nextpageexists'=>$pageitems['nextpageexists']));
	$pagetitle="{$lnc[208]} // ";
}

if ($job=='archivelist') {
	$allvaliddates=$blog->getarraybyquery("SELECT `pubtime` FROM `{$db_prefix}blogs` WHERE property='0' ORDER BY `pubtime` DESC");
	$allvaliddates=$allvaliddates['pubtime'];
	$resultdates=array();
	$dayarticlenum=array();
	$dayhot=array();
	
// Archive Page Infographics
	$the_current_time=time();
	$totaldays=floor(($the_current_time-1154998861)/(24*60*60));
	$averageposts=floor($totaldays/$statistics['entries']*10)/10;
	$totalvisits=floor(($statistics['total'])/10000);
	$totalvisits2=floor(($totalvisits*10/8)/2.5)/10;
	$totalwords=floor($statistics['entries']*1500/660000*10)/10;	
	$result="
	<link rel=\"stylesheet\" rev=\"stylesheet\" href=\"../../../archive.css\" type=\"text/css\" media=\"all\" />
	<div class=\"archive-infographics\">
		<div class=\"main-counters infographics-total-entries\">
			<div class=\"counters-numbers\">{$statistics['entries']}</div>
			<div class=\"counters-desc\">篇博文<span><i class=\"font-icon icon-asterisk\"></i> 总字数相当于 {$totalwords} 本《新华字典》</span></div>
		</div>
		<div class=\"main-counters infographics-total-visits\">
			<div class=\"counters-numbers\">{$totalvisits}</div>
			<div class=\"counters-desc\">万次访问<span><i class=\"font-icon icon-asterisk\"></i> 访客需要装 {$totalvisits2} 个上海体育场</span></div>
		</div>
		<div class=\"main-counters infographics-total-entries\">
			<div class=\"counters-numbers\">{$totaldays}</div>
			<div class=\"counters-desc\">天前建站<span><i class=\"font-icon icon-asterisk\"></i> 平均每 {$averageposts} 天一篇博文</span></div>
		</div>
	</div>

	<div class=\"archive-list\">";
	
	if (is_array($allvaliddates)) {
		foreach ($allvaliddates as $time) {
			$y1=gmdate('Y', $time+3600*$config['timezone']);
			$m1=gmdate('n', $time+3600*$config['timezone']);
			$d1=gmdate('d', $time+3600*$config['timezone']);
			$resultdates[$y1][$m1]+=1;
			$dayarticlenum[$y1][$m1][$d1]+=1;
		}
		$uniquedates=array_keys($resultdates);
		for ($i=0; $i<count($uniquedates); $i++) {
			$y=$uniquedates[$i];
			$yeararchivecount=0;		
			for ($j=1; $j<13; $j++) {
				$resultdates[$y][$j]=floor($resultdates[$y][$j]);
				$yeararchivecount+=$resultdates[$y][$j];
			}
			
			$result.="<div class=\"archive-year-$y\"><div class=\"archive-year\">{$y} 年<span class=\"archive-year-count\">{$yeararchivecount} 篇博文</span></div>";
			
$yearhot=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}blogs` WHERE year(from_unixtime(pubtime)) =$y and property='0' ORDER BY `views` DESC LIMIT 0 , 7");
if (is_array($yearhot)) {
$viewhows='<ol class="archive-hot">';
foreach ($yearhot as $onehotview) {

if($onehotview['blogalias']=="") {
$viewhows.="<li><a href=\"read.php?".$onehotview['blogid']."\">{$onehotview['title']}</a></li>";
} else {
 $viewhows.="<li><a href=\"".$onehotview['blogalias']."\">{$onehotview['title']}</a></li>";	
}

}
$viewhows.="</ol><div class=\"clear\"></div>";
} else {
$viewhows='今年才过了几天，没内容呢亲，饶了博主吧~';
}
			$result.=$viewhows;
			$result.='<div class="archive-summary"><div class="archive-summary-header"><div>Jan</div><div>Feb</div><div>Mar</div><div>Apr</div><div>May</div><div>Jun</div><div>Jul</div><div>Aug</div><div>Sep</div><div>Oct</div><div>Nov</div><div>Dec</div></div>';
			$yeardaynum=1;
			for ($j=1; $j<13; $j++) {
				switch ($j) {
					case 2:
						$monthdaynum=29;
						break;
					case 4:
						$monthdaynum=31;
						break;
					case 6:
						$monthdaynum=31;
						break;
					case 9:
						$monthdaynum=31;
						break;
					case 11:
						$monthdaynum=31;
						break;
					case 12:
						$monthdaynum=31;    //	最后一天直接去掉保持整齐
						break;
					default:
						$monthdaynum=32;
				}
				for ($k=1; $k<$monthdaynum; $k++) {
					$currentdaynum=$dayarticlenum[$y][$j][$k];
					if (($yeardaynum-1)%7==0 and $yeardaynum!=1) {
						$result.='</div><div class="s-m">';
					}
					if ($yeardaynum==1) {
						$result.='<div class="s-m">';
					}

					if ($currentdaynum>0) {
						if ($currentdaynum>2) {
							$summarydaynum=3;
						}
						else {
							$summarydaynum=$currentdaynum;
						}
						$result.="<a class='d$summarydaynum' title='$j 月 $k 日 • $currentdaynum 篇博文' href='index.php?go=showday_$y-$j-$k'></a>";
					}
					else {
						$timestampforthisday = mktime(0,0,0,$j,$k,$y);

						if ($timestampforthisday < time()) {
							$result.="<a class='d0'></a>";
						}
						else {
							$result.='<a class="df"></a>';
						}
					}
					$yeardaynum+=1;
				}
			}
			$result.='<div class="clear"></div></div></div></div>';
			
		}
	}
	
	
	$result.='</div>';
	$archivepagetitle="";
	$section_body_main=$t->set('contentpage', array('title'=>$archivepagetitle, 'contentbody'=>$result));
	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>'', 'iftoppage'=>'none', 'ifbottompage'=>'none',  'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>$section_body_main, 'currentpage'=>'', 'previouspageurl'=>'', 'nextpageurl'=>'', 'turningpages'=>'', 'totalpages'=>'', 'previouspageexists'=>'', 'nextpageexists'=>''));
}