<?PHP
//Some changes
//Time format
$timeformat="<b>n</b> 月 <b>j</b> 日";

require ("function.php");

$newvolume=$_GET['n'];
$target=$_GET['target'];
$category=$_GET['category'];
$time=$_GET['time'];

$targets=($target=='') ? '': " target='{$target}'";
$number=($newvolume=='') ? 5 : floor($newvolume);
$category=($category=='') ? '' : floor($category);

$news=GetNewPosts ($number, 'blogid,title,pubtime,blogalias', 0, $category);

if (!is_array($news)) exit();
else {
	foreach ($news as $entry) {
		$times=($time==1) ? "".gmdate($timeformat, $entry['pubtime']+$config['timezone']*3600)."" : '';
		$show.="<li><a href='{$config['blogurl']}/".getlink_entry($entry['blogid'], $entry['blogalias'])."'{$targets}><span class='blog-post-title'>{$entry['title']}</span> </a><span class='blog-post-date'> {$times}</span></li>";		
	}
}

@header("Content-Type: text/javascript; charset=utf-8");
die ("document.write(\"<ul>{$show}</ul>\");");

?>