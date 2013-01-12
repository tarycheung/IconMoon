<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');
$plugin_ubbeditor_buttons=$plugin_ubbeditor_functions='';
plugin_runphp('ubbeditor');

$srcHTML="data/cache_emsel.php";

@include ($srcHTML);
$emots=str_replace("<br/>", ' ', $emots);
$emots=str_replace("</a>", '</a> ', $emots);


if ($act=='edit') {
	$editoreditmodeonly=<<<eot
<a href="JavaScript: void(0); "><IMG border=0 onclick="AddText('[separator]')" title="{$lna[701]}" src="editor/ubb/images/separator.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="AddText('[newpage]')" title="{$lna[702]}" src="editor/ubb/images/newpage.gif" ></a>
eot;
	$editoreditmodeonly2=<<<eot
<br><span id="timemsg">{$lna[1179]}</span>&nbsp; &nbsp;<span id="timemsg2"></span>
 <script type='text/javascript' src='editor/ubb/autosaver.js'>
</script>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="javascript: stopautosaver();">{$lna[1176]}</a>] | [<a href="javascript: restartautosaver();">{$lna[1175]}</a>] | [<a href="javascript: stopforever();">{$lna[1177]}</a>] | [<a href="javascript: switchtodraft();">{$lna[1173]}</a>] | [<a href="javascript: savedraft();">{$lna[1178]}</a>] | [<a href="javascript: cleardraft();">{$lna[1180]}</a>]
eot;
}

$editorjs=<<<eot
<script type="text/javascript" src="editor/ubb/ubbeditor.js"></script>
<script type="text/javascript">
function insertemot (emotcode) {
	var emot="[emot]"+emotcode+"[/emot]";
	AddText(emot);
	document.getElementById('emotid').style.display='none';
}

function showemot () {
	if (document.getElementById('emotid').style.display=='block') document.getElementById('emotid').style.display='none';
	else document.getElementById('emotid').style.display='block';
}
$plugin_ubbeditor_functions
</script>
eot;
$onloadjs=" onload=\"init_ubb('content');\"";

$editorbody=<<<eot
<a href="JavaScript: void(0); "><IMG border=0 onclick=bold() title="{$lna[681]}" src="editor/ubb/images/bold.gif" ></a>
<input type="button" id="ed_bold" accesskey="b" class="ed_button" onclick="edInsertTag(edCanvas, 0);" value="B">
<a href="JavaScript: void(0); "><IMG border=0 onclick=italicize() title="{$lna[682]}" src="editor/ubb/images/italic.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=underline() title="{$lna[683]}" src="editor/ubb/images/underline.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=strike() title="{$lna[684]}" src="editor/ubb/images/strikethrough.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=subsup('sup') title="{$lna[685]}" src="editor/ubb/images/superscript.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=subsup('sub') title="{$lna[686]}" src="editor/ubb/images/subscript.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=center() title="{$lna[687]}" src="editor/ubb/images/center.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=hyperlink() title="{$lna[688]}" src="editor/ubb/images/url.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=email() title="{$lna[689]}" src="editor/ubb/images/email.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=image() title="{$lna[690]}" src="editor/ubb/images/insertimage.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=showcode() title="{$lna[694]}" src="editor/ubb/images/code.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick=quoteme() title="{$lna[695]}" src="editor/ubb/images/quote.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="addacronym();" title="{$lna[696]}" src="editor/ubb/images/acronym.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="AddText('[hr]')" title="{$lna[697]}" src="editor/ubb/images/line.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="addfile();" title="{$lna[698]}" src="editor/ubb/images/file.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="addsfile();" title="{$lna[699]}" src="editor/ubb/images/sfile.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="showemot()" title="{$lna[700]}" src="editor/ubb/images/insertsmile.gif" ></a>
$editoreditmodeonly
<script type="text/javascript">
if (is_firefox) {
	document.write("<a href='JavaScript: void(0); '><IMG border=0 onclick='undo_fx();' title='{$lna[703]}' src='editor/ubb/images/undo.gif' ></a>");
}

</script>{$plugin_ubbeditor_buttons}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="javascript: showhidediv('FrameUpload');" title="{$lna[741]}" class="thickbox">Upload Files</a>

<div id="FrameUpload" style="display: none;"><iframe width=90% frameborder=0 height=200 frameborder=0 src='admin.php?act=upload&useeditor={$useeditor}'></iframe></div>
<textarea name='content' id='content' rows='30' cols='124' class='formtextarea'>{content}</textarea>
$editoreditmodeonly2

<input type=hidden id='content_old' value=''>
<!-- <br><ul>
<script type="text/javascript">
if (is_firefox) {
	document.write("{$lna[742]}");
}
</script>
<li>{$lna[743]}</li>
<li>{$lna[744]}</li></ul> -->
eot;

$initialjs="<script type='text/javascript' src=\"editor/ubb/uploader.js\"></script>";

$autobr=1;
