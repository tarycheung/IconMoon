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
	$allvaliddates=$blog->getarraybyquery("SELECT `pubtime` FROM `{$db_prefix}blogs` ORDER BY `pubtime` DESC");
	$allvaliddates=$allvaliddates['pubtime'];
	$resultdates=array();
	$totalarchivecount=0;	
	
// Archive Page Infographics
	$the_current_time=time();
	$days=floor(($the_current_time-1154998861)/(24*60*60));
	$averageposts=floor($days/$statistics['entries']*10)/10;
	$totalvisits=floor(($statistics['total'])/10000);
	$totalvisits2=floor(($totalvisits*10/8)/2.5)/10;
	$totalwords=floor($statistics['entries']*1500/660000*10)/10;
	$result="
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
			<div class=\"counters-numbers\">{$days}</div>
			<div class=\"counters-desc\">天前建站<span><i class=\"font-icon icon-asterisk\"></i> 平均每 {$averageposts} 天一篇博文</span></div>
		</div>
	</div>

	<div class=\"archive-list\">
	<script type=\"text/javascript\" src=\"http://cdn.amcharts.com/lib/3/amcharts.js\"></script><script type=\"text/javascript\" src=\"http://cdn.amcharts.com/lib/3/serial.js\"></script>";
	
	if (is_array($allvaliddates)) {
		foreach ($allvaliddates as $time) {
			$y=gmdate('Y', $time+3600*$config['timezone']);
			$m=gmdate('n', $time+3600*$config['timezone']);
			$resultdates[$y][$m]+=1;
		}

		$uniquedates=array_keys($resultdates);
		for ($i=0; $i<count($uniquedates); $i++) {
			$y=$uniquedates[$i];
			$yeararchivecount=0;		
			for ($j=12; $j>0; $j--) {

				$resultdates[$y][$j]=floor($resultdates[$y][$j]);
				$yeararchivecount+=$resultdates[$y][$j];
			}
			
			$result.="<div class=\"archive-year-$y\"><div class=\"archive-year\">{$y} 年<span class=\"archive-year-count\">{$yeararchivecount} 篇博文</span></div>";
			
$yearhot=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}blogs` WHERE year(from_unixtime(pubtime)) =$y ORDER BY `views` DESC LIMIT 0 , 7");
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
$viewhows='No view!';
}
			$result.=$viewhows;
			$montharticlenum=array("0","0","0","0","0","0","0","0","0","0","0","0");
			for ($j=12; $j>0; $j--) {
				$resultdates[$y][$j]=floor($resultdates[$y][$j]);
				$montharticlenum[$j-1]=$resultdates[$y][$j];
			}$result.="<br />
			<script type=\"text/javascript\">
				AmCharts.makeChart(\"chartdiv-$y\",
					{
						\"type\": \"serial\",
						\"pathToImages\": \"http://cdn.amcharts.com/lib/3/images/\",
						\"categoryField\": \"category\",
						\"fontFamily\": \"Lato, Hiragino Sans GB, Microsoft Yahei, 微软雅黑, sans-serif\",
						\"autoMarginOffset\": 0,
						\"columnWidth\": 0.8,
						\"marginBottom\": 0,
						\"marginLeft\": 0,
						\"marginRight\": 0,
						\"marginTop\": 10,
						\"colors\": [
							\"#e8eaed\",
							\"#FCD202\",
						],
						\"startDuration\": 0.8,
						
						\"handDrawScatter\": 6,
						\"handDrawThickness\": 8,
						\"startEffect\": \"bounce\",
						\"categoryAxis\": {
							\"axisAlpha\": 0.3,
							\"color\": \"#7987a8\",
							\"titleColor\":\"#7987a8\",
							\"gridAlpha\": 0.04,
							\"gridPosition\": \"start\",
							\"gridAlpha\": 0
						},
						\"trendLines\": [],
						\"graphs\": [
							{
								\"balloonText\": \"[[category]]博文数：[[value]]\",
								\"cornerRadiusTop\": -4,
								\"fillAlphas\": 1,
								\"id\": \"AmGraph-1\",
								\"title\": \"博文数\",
								\"type\": \"column\",
								\"valueField\": \"column-1\",
								\"visibleInLegend\": false
							}
						],
						\"guides\": [],
						\"valueAxes\": [
							{
								\"id\": \"ValueAxis-1\",
								\"stackType\": \"regular\",
								\"title\": \"博文数\",
								\"position\": \"right\",
								\"titleBold\": false,
								\"showLastLabel\": false,
								\"axisAlpha\": 0.1,
								\"color\": \"#7987a8\",
								\"titleColor\":\"#7987a8\",
								\"gridAlpha\": 0.04
							}
						],
						\"allLabels\": [],
						\"balloon\": {
							\"borderAlpha\": 0,
							\"borderColor\":\"#0157ae\",
							\"fillColor\": \"#0157ae\",
							\"fillAlpha\": 0.92,
							\"verticalPadding\": 0,
							\"color\": \"#ffffff\",
							\"shadowAlpha\": 0
						},
						\"dataProvider\": [
							{
								\"category\": \"一月\",
								\"column-1\": $montharticlenum[0]
							},
							{
								\"category\": \"二月\",
								\"column-1\": $montharticlenum[1]
							},
							{
								\"category\": \"三月\",
								\"column-1\": $montharticlenum[2]
							},
							{
								\"category\": \"四月\",
								\"column-1\": $montharticlenum[3]
							},
							{
								\"category\": \"五月\",
								\"column-1\": $montharticlenum[4]
							},
							{
								\"category\": \"六月\",
								\"column-1\": $montharticlenum[5]
							},
							{
								\"category\": \"七月\",
								\"column-1\": $montharticlenum[6]
							},
							{
								\"category\": \"八月\",
								\"column-1\": $montharticlenum[7]
							},
							{
								\"category\": \"九月\",
								\"column-1\":$montharticlenum[8]
							},
							{
								\"category\": \"十月\",
								\"column-1\": $montharticlenum[9]
							},
							{
								\"category\": \"十一月\",
								\"column-1\": $montharticlenum[10]
							},
							{
								\"category\": \"十二月\",
								\"column-1\": $montharticlenum[11]
							}
						]
					}
				);
			</script>
			
			<div id=\"chartdiv-$y\" class=\"archive-month-chart\" style=\"width: 100%; height: 160px; background-color: #FFFFFF;\" ></div></div>
			
			";
			$totalarchivecount+=$yeararchivecount;
			
		}
	}
	
	
	$result.="</div>";
	$archivepagetitle="";
	$section_body_main=$t->set('contentpage', array('title'=>$archivepagetitle, 'contentbody'=>$result));
	announcebar();
	$bodymenu=$t->set('mainpage', array('pagebar'=>'', 'iftoppage'=>'none', 'ifbottompage'=>'none',  'ifannouncement'=>$ifannouncement, 'topannounce'=>$topannounce, 'mainpart'=>$section_body_main, 'currentpage'=>'', 'previouspageurl'=>'', 'nextpageurl'=>'', 'turningpages'=>'', 'totalpages'=>'', 'previouspageexists'=>'', 'nextpageexists'=>''));
}