<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');



$plugin_ubbeditor_buttons=$plugin_ubbeditor_functions='';
plugin_runphp('ubbeditor');

$srcHTML="data/cache_emsel.php";

if ($act=='edit') {
	$editoreditmodeonly=<<<eot
<a href="JavaScript: void(0); "><IMG border=0 onclick="AddText('[separator]')" title="{$lna[701]}" src="editor/ubb/images/separator.gif" ></a>
<a href="JavaScript: void(0); "><IMG border=0 onclick="AddText('[newpage]')" title="{$lna[702]}" src="editor/ubb/images/newpage.gif" ></a>
eot;
	$editoreditmodeonly2=<<<eot
eot;
}

$editorjs=<<<eot
<script type="text/javascript" src="editor/quicktags/js_quicktags.js"></script>
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

$onloadjs="";



$editorbody=<<<eot


<div style="margin:8px 30px 10px 10px; float:right;"><a href="javascript: showhidediv('FrameUpload');" title="Uploader" class="thickbox upload-btn"><i class="font-icon icon-upload"></i> <b>Upload</b></a></div>

<div id="icon-list">
	<a href="http://shoestrap.org/downloads/elusive-icons-webfont/" target="_blank">Icon List</a>
</div>

<script type="text/javascript">edToolbar();</script>



<div id="FrameUpload" style="display: none;"><iframe width=90% frameborder=0 height=200 frameborder=0 src='admin.php?act=upload&useeditor={$useeditor}'></iframe></div>
<textarea name='content' id='content' class='formtextarea edit-entry'>{content}</textarea>
$editoreditmodeonly2



<script type="text/javascript">var edCanvas = document.getElementById('content');</script>
<br/>
<br/>
</div>
eot;

$initialjs="<script type='text/javascript' src=\"editor/quicktags/uploader.js\"></script>";

$autobr=1;