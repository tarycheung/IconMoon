<?PHP
if (!defined('VALIDADMIN')) die ('Access Denied.');
checkpermission('CP');

$backtoplugin="{$lna[28]}|admin.php?go=addon_plugin";
$backtolightconfig="dp.SyntaxHighlighter For UBB|admin.php?act={$act}";
acceptrequest('configjob');

if ($configjob=='save') {
	$savetext="<?PHP\n";
	$save_config=$_POST['prefconfig'];
	if (count($save_config)<=1) catcherror ($lna[1013]);
	while (@list ($key, $val) = @each ($save_config)) {
		$savetext.="\$dp_config['{$key}']='".admin_convert($val)."';\n";
	}
	if ($savetext=='') catcherror ($lna[1013]);
	if (!writetofile("plugin/{$act}/config.php", $savetext)) catcherror("{$lna[66]}"."plugin/{$act}/config.php");
	else catchsuccess ($lanic[$select_include_n].$lanic[9], array($backtoplugin, $backtolightconfig));
}

	$pref_leftchar="200";
	$pref_variable="dp_config";
	include("plugin/{$act}/config.php");
	addpref("r", "Cpp|C|{$lna[511]}|{$lna[512]}");
	addpref("r", "CSharp|C#|{$lna[511]}|{$lna[512]}");
	addpref("r", "Vb|Visual Basic|{$lna[511]}|{$lna[512]}");
	addpref("r", "Delphi|Delphi|{$lna[511]}|{$lna[512]}");
	addpref("r", "Python|Python|{$lna[511]}|{$lna[512]}");
	addpref("r", "Ruby|Ruby|{$lna[511]}|{$lna[512]}");
	addpref("r", "Java|JAVA|{$lna[511]}|{$lna[512]}");
	addpref("r", "Sql|SQL|{$lna[511]}|{$lna[512]}");
	addpref("r", "Css|CSS|{$lna[511]}|{$lna[512]}");
	addpref("r", "Php|PHP|{$lna[511]}|{$lna[512]}");
	addpref("r", "JScript|Java Script|{$lna[511]}|{$lna[512]}");
	addpref("r", "Xml|HTML/XML|{$lna[511]}|{$lna[512]}");

	$pref_result_show=@implode('', $pref_result);
	
$plugin_return=<<<eot
<table class="tablewidth" align="center" cellpadding="4" cellspacing="0">
	<tr>
		<td width="280" class="sectstart">dp.SyntaxHighlighter For UBB Setting</td>
		<td class="sectend"></td>
	</tr>
</table>
<br/>
<form action="admin.php?go={$act}" method="post">
	<table class="tablewidth" cellpadding="4" cellspacing="1" align="center">
	$pref_result_show
	</table>
<br/>
<div align="center"><input type="hidden" value="save" name="configjob" /><input type="submit" value="{$lna[64]}"/> <input type="reset" value="{$lna[65]}" /></div>
</form>
eot;
?>