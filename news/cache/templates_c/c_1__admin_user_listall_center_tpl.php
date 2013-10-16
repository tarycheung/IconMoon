<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/modifier.sanitize.php'); $this->register_modifier("sanitize", "tpl_modifier_sanitize");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:47:36 CEST */ ?>

<h2><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/manage_user.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_User_Manage']; ?>
</h2>
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<form action="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php" method="get">
			<td width="300px">
				<input type="hidden" name="mode" value="search">
				<?php if (isset ( $_GET['keyword'] ) && $_GET['keyword'] != ""): ?>
						<?php $this->assign('searchboxtext', $this->_run_modifier($_GET['keyword'], 'sanitize', 'plugin', 1, 2)); ?>
				<?php else: ?>
						<?php $this->assign('searchboxtext', $this->_confs['PLIGG_Visual_Search_SearchDefaultText']); ?>			
				<?php endif; ?>
				<input type="text" size="30" name="keyword" value="<?php echo $this->_vars['searchboxtext']; ?>
" onfocus="if(this.value == '<?php echo $this->_vars['searchboxtext']; ?>
') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $this->_vars['searchboxtext']; ?>
';}">
				<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Search_Go']; ?>
">			  
			</td>
			<td width="100px">
				<select name="filter" onchange="this.form.submit()">
					<option value="">-- User Level --</option>
					<option value="god" <?php if ($_GET['filter'] == "god"): ?> selected="selected" <?php endif; ?>>God</option>
					<option value="admin" <?php if ($_GET['filter'] == "admin"): ?> selected="selected" <?php endif; ?>>Admin</option>
					<option value="normal" <?php if ($_GET['filter'] == "normal"): ?> selected="selected" <?php endif; ?>>Normal</option>
					<option value="spammer" <?php if ($_GET['filter'] == "spammer"): ?> selected="selected" <?php endif; ?>>Spammer</option>
				</select>
			</td>
			<td width="250px">
				<select name="pagesize" onchange="this.form.submit()">
					<option value="15" <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 15): ?>selected<?php endif; ?>>Show 15</option>
					<option value="30" <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 30): ?>selected<?php endif; ?>>Show 30</option>
					<option value="50" <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 50): ?>selected<?php endif; ?>>Show 50</option>
					<option value="100" <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 100): ?>selected<?php endif; ?>>Show 100</option>
					<option value="200" <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 200): ?>selected<?php endif; ?>>Show 200</option>
				</select>
				<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Pagination_Items']; ?>

			</td>
		</form>
<form name='bulk' action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php" method="post">
		<td style="float:right;margin:0px 2px 0 0"><input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Apply_Changes']; ?>
" class="log2" /></td>
	</tr>
</table>

<?php if (isset ( $this->_vars['usererror'] )): ?> <span class="error"><?php echo $this->_vars['usererror']; ?>
</span><br/><br/><?php endif; ?>
<?php echo $this->_vars['hidden_token_admin_users_list']; ?>

<table class="stripes" cellpadding="0" cellspacing="0" border="0">
<tr>
<th style="width:40px;text-align:center;">ID</th>
<th style="width:40px"></th>
<th><?php echo $this->_confs['PLIGG_Visual_Login_Username']; ?>
</th>
<th style="width:80px"><?php echo $this->_confs['PLIGG_Visual_View_User_Level']; ?>
</th>
<th><?php echo $this->_confs['PLIGG_Visual_View_User_Email']; ?>
</th>
<th style="width:140px"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Joined']; ?>
</th>
<th style="text-align:center;width:70px;"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Enabled']; ?>
</th>
<th style="text-align:center;width:80px;"><input type='checkbox' onclick='check_all(this);' style="float:left;margin:2px 0 0 0;"><?php echo $this->_confs['PLIGG_Visual_KillSpam']; ?>
</th>
</tr>
	<?php if (isset($this->_sections['nr'])) unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($this->_vars['userlist']) ? count($this->_vars['userlist']) : max(0, (int)$this->_vars['userlist']);
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
	<tr>
	<td style="width:40px;text-align:center;"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
</td>
	<td style="width:40px;text-align:center;"><img src="<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['Avatar']; ?>
" /></td>
	<td><a href = "?mode=view&user=<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_login']; ?>
</a></td>	
	<td style="text-transform:capitalize"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_level']; ?>
</td>
	<td>
		<div style="margin:0 10px 0 0;padding:0;float:left;">
			<?php if ($this->_vars['userlist'][$this->_sections['nr']['index']]['user_lastlogin'] != "0000-00-00 00:00:00"): ?>
				<img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/icon_share_true.gif" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Confirmed_Email']; ?>
" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Confirmed_Email']; ?>
" />
			<?php else: ?>
				<a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/admin_user_validate.php?id=<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
" class="colorbox_iframe1" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Confirmed_Email']; ?>
"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/icon_bury.gif" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Unconfirmed_Email']; ?>
" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Unconfirmed_Email']; ?>
" /></a>
			<?php endif; ?>
		</div>
		<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_email']; ?>

	</td>
	<td><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_date']; ?>
</td>
	<td><div style="text-align:center"><input type="checkbox" onclick="document.getElementById('enabled_<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
').value=this.checked ? 1 : 0;" <?php if ($this->_vars['userlist'][$this->_sections['nr']['index']]['user_enabled']): ?>checked<?php endif; ?>></div>
	<input type="hidden" name="enabled[<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
]" id="enabled_<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
" value="<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_enabled']; ?>
">
	</td>
	<td><div style="text-align:center"><input type='checkbox' id='delete' name='delete[]' value='<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
'></div></td>	
	</tr>
	<?php endfor; endif; ?>
</table>
	<div style="float:right;margin:8px 2px 0 0;"><input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Apply_Changes']; ?>
" class="log2" /></div>
	<div style="clear:both;"> </div>
</form>

<div class="admin_bottom_button"><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php?mode=create" class="colorbox_iframe1" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_New_User']; ?>
"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_add.gif" style="margin-top:2px;"/><p style="margin:1px 0 0 3px;float:right;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_New_User']; ?>
</p></a></div>
<div style="clear:both;"> </div>

<SCRIPT>
<?php echo '
function check_all(elem) {
	for (var i=0; i< document.bulk.length; i++) 
		if (document.bulk[i].id == "delete")
			document.bulk[i].checked = elem.checked;
}
'; ?>

</SCRIPT>

