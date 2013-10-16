<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.html_options.php'); $this->register_function("html_options", "tpl_function_html_options");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 10:12:28 CEST */ ?>

<?php if (isset($this->_sections['nr'])) unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($this->_vars['userdata']) ? count($this->_vars['userdata']) : max(0, (int)$this->_vars['userdata']);
$this->_sections['nr']['show'] = true;
$this->_sections['nr']['max'] = $this->_sections['nr']['loop'];
$this->_sections['nr']['step'] = 1;
$this->_sections['nr']['start'] = $this->_sections['nr']['step'] > 0 ? 0 : $this->_sections['nr']['loop']-1;
if ($this->_sections['nr']['show']) {
	$this->_sections['nr']['total'] = $this->_sections['nr']['loop'];
	if ($this->_sections['nr']['total'] == 0)
		$this->_sections['nr']['show'] = false;
} else
	$this->_sections['nr']['total'] = 0;
if ($this->_sections['nr']['show']):

		for ($this->_sections['nr']['index'] = $this->_sections['nr']['start'], $this->_sections['nr']['iteration'] = 1;
			 $this->_sections['nr']['iteration'] <= $this->_sections['nr']['total'];
			 $this->_sections['nr']['index'] += $this->_sections['nr']['step'], $this->_sections['nr']['iteration']++):
$this->_sections['nr']['rownum'] = $this->_sections['nr']['iteration'];
$this->_sections['nr']['index_prev'] = $this->_sections['nr']['index'] - $this->_sections['nr']['step'];
$this->_sections['nr']['index_next'] = $this->_sections['nr']['index'] + $this->_sections['nr']['step'];
$this->_sections['nr']['first']	  = ($this->_sections['nr']['iteration'] == 1);
$this->_sections['nr']['last']	   = ($this->_sections['nr']['iteration'] == $this->_sections['nr']['total']);
?>
<script>
var message = "<?php echo $this->_confs['PLIGG_Visual_Register_Error_NoPassMatch']; ?>
";
<?php echo '
function check(form)
{
    if (form.password.value != form.password2.value)
    {
	alert(message);
	form.password.focus();
	return false;
    }
    return true;
}
'; ?>

</script>
<h1><?php echo $this->_confs['PLIGG_Visual_Breadcrumb_Edit_User']; ?>
: <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
</h1>
	<form id="form1" name="form1" method="get" action="" onsubmit="return check(this);">
		<input type=hidden name=user value="<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
">
		<?php echo $this->_vars['hidden_token_admin_users_edit']; ?>


		<a href="<?php echo $this->_vars['my_pligg_base']; ?>
/profile.php?login=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Submit3_Modify']; ?>
 <?php echo $this->_confs['PLIGG_Visual_Breadcrumb_Profile']; ?>
 <?php echo $this->_confs['PLIGG_Visual_Profile']; ?>
</a>
		<br /><br />
		
		<label><?php echo $this->_confs['PLIGG_Visual_View_User_Login']; ?>
:</label>
		<input name=login value="<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><br />
		
		<?php if ($this->_vars['userdata'][$this->_sections['nr']['index']]['user_id'] != 1): ?>
			<label><?php echo $this->_confs['PLIGG_Visual_View_User_Level']; ?>
:</label>
			<SELECT NAME="level"><?php echo tpl_function_html_options(array('values' => $this->_vars['levels'],'output' => $this->_vars['levels'],'selected' => $this->_vars['userdata'][$this->_sections['nr']['index']]['user_level']), $this);?></SELECT><br/>
		<?php else: ?>
			<input name="level" type="hidden" value="<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_level']; ?>
" />
		<?php endif; ?>

		<label><?php echo $this->_confs['PLIGG_Visual_View_User_Email']; ?>
:</label>
		<input name=email value="<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_email']; ?>
">
		<br /><br />

		<label><?php echo $this->_confs['PLIGG_Visual_Profile_NewPass']; ?>
:</label>
		<input name=password type='password'><br />

		<label><?php echo $this->_confs['PLIGG_Visual_Profile_VerifyNewPass']; ?>
:</label>
		<input name=password2 type='password'>
		<br /><br />
		
		<div class="admin_bottom_button"><a href="?mode=resetpass&user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login'];  echo $this->_vars['uri_token_admin_users_edit']; ?>
" onclick="return confirm('<?php echo $this->_confs['PLIGG_Visual_View_User_Reset_Pass_Confirm']; ?>
')"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_reset.gif" style="margin-top:2px;"/><p style="margin:1px 0 0 3px;float:right;"><?php echo $this->_confs['PLIGG_Visual_View_User_Reset_Pass']; ?>
</p></a></div>
		<div style="clear:both;"> </div>

		<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_admin_user_edit_center_fields"), $this);?>
		<br/><input type=submit name=mode value="<?php echo $this->_confs['PLIGG_Visual_Profile_Save']; ?>
" class="log2">&nbsp;&nbsp;&nbsp;<input type=button onclick="window.history.go(-1)" value="<?php echo $this->_confs['PLIGG_Visual_View_User_Edit_Cancel']; ?>
" class="log2">
	</form>	

<?php endfor; else: ?>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include($this->_vars['my_pligg_base'], array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>/templates/admin/user_doesnt_exist_center.tpl"}
<?php endif; ?>