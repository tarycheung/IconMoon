<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 10:12:19 CEST */ ?>

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
	<h1>View User</h1>
	<table class="stripes" cellpadding="0" cellspacing="0">
		<th colspan="2">Viewing <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
</th>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_Login']; ?>
: </strong></td><td><img src="<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['Avatar']; ?>
" align="absmiddle"/> <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_Level']; ?>
: </strong></td><td><?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_level']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_Email']; ?>
: </strong></td><td><?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_email']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_LL_Date']; ?>
: </strong></td><td><?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_lastlogin']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_LL_Address']; ?>
: </strong></td><td> <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_lastip']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_Groups_Belongs']; ?>
: </strong></td><td> <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['belongs']; ?>
</td></tr>
		<tr><td width="160px"><strong><?php echo $this->_confs['PLIGG_Visual_View_User_Groups_Created']; ?>
: </strong></td><td> <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['created']; ?>
</td></tr>
		<?php if ($this->_vars['userdata'][$this->_sections['nr']['index']]['user_login'] != "god"): ?><tr><td><strong><?php echo $this->_confs['PLIGG_Visual_View_User_IP_Address']; ?>
:</strong></td><td> <?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_ip']; ?>
</td></tr><?php endif; ?>
		<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_admin_user_show_center_fields"), $this);?>
		<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_links.gif" align="absmiddle"/> <a href="admin_links.php?user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Sub_Links']; ?>
</a></td> <td> <?php echo $this->_vars['linkcount']; ?>
 Total</td></tr>
		<br />
		<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_comments.gif" align="absmiddle"/> <a href="admin_comments.php?user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Sub_Comments']; ?>
</a></td> <td> <?php echo $this->_vars['commentcount']; ?>
 Total</td></tr>
	</table>	
<hr/>
		
<?php if ($this->_vars['amIgod']): ?>		

	<table>
		<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_edit.gif" align="absmiddle"/> <a href="?mode=edit&user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Edit_Data']; ?>
</a></td></tr>
		<?php if ($this->_vars['user_logged_in'] != $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login'] && $this->_vars['userdata'][$this->_sections['nr']['index']]['user_id'] != '1'): ?>
			<?php if ($this->_vars['userdata'][$this->_sections['nr']['index']]['user_enabled']): ?>
			<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_disable.gif" align="absmiddle"/> <a href="?mode=disable&user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Disable']; ?>
</a></td></tr>
			<?php else: ?>
			<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_disable.gif" align="absmiddle"/> <a href="?mode=enable&user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Enable']; ?>
</a></td></tr>
			<?php endif; ?>
			<tr><td><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_killspam.gif" align="absmiddle"/> <a href="?mode=killspam&user=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_login']; ?>
&id=<?php echo $this->_vars['userdata'][$this->_sections['nr']['index']]['user_id']; ?>
"><?php echo $this->_confs['PLIGG_Visual_View_User_Killspam']; ?>
</a></td></tr>
		<?php endif; ?>
	</table>

<?php endif; ?>

<?php endfor; else: ?>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("/templates/admin/user_doesnt_exist_center.tpl", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<?php endif; ?>
