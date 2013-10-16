<?php /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:47:46 CEST */ ?>

<h2><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/page.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Manage_Groups']; ?>
</h2>
<br /><br />
	<table class="stripes" cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
				<th><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Name']; ?>
</th>
				<th><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Author']; ?>
</th>
				<th width="120px"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Privacy']; ?>
</th>
				<th width="120px"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Date']; ?>
</th>
				<th style="width:40px;text-align:center;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Edit']; ?>
</th>
				<th style="width:50px;text-align:center;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Delete']; ?>
</th>
			</tr>
		</thead>
		<tbody>
		<?php if (count((array)$this->_vars['groups'])):  foreach ((array)$this->_vars['groups'] as $this->_vars['group']): ?>
			<tr>
				<td>
					<?php if ($this->_vars['group']['group_status'] != 'Enable'): ?>
						<a href='?mode=approve&group_id=<?php echo $this->_vars['group']['group_id']; ?>
'><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/icon_bury.gif" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Approve']; ?>
" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Approve']; ?>
" /></a>
					<?php else: ?>
						<img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/icon_share_true.gif" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Approve']; ?>
d" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Approve']; ?>
d" />
					<?php endif; ?>
					<a href="<?php echo $this->_vars['my_pligg_base']; ?>
/group_story.php?id=<?php echo $this->_vars['group']['group_id']; ?>
"><?php echo $this->_vars['group']['group_name']; ?>
</a>
				</td>
				<td><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php?mode=view&user=<?php echo $this->_vars['group']['user_login']; ?>
"><?php echo $this->_vars['group']['user_login']; ?>
</a></td>
				<td><?php echo $this->_vars['group']['group_privacy']; ?>
</td>
				<td><?php echo $this->_vars['group']['group_date']; ?>
</td>
				<td style="text-align:center;"><a href='../editgroup.php?id=<?php echo $this->_vars['group']['group_id']; ?>
' rel="width:800,height:700"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_edit.gif" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Edit']; ?>
" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Edit']; ?>
" /></a></td>
				<td style="text-align:center;"><a onclick='return confirm("<?php echo $this->_confs['PLIGG_Visual_Group_Delete_Confirm']; ?>
");' href='?mode=delete&group_id=<?php echo $this->_vars['group']['group_id']; ?>
'><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/delete.png" alt="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Delete']; ?>
" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Group_Delete']; ?>
" /></a></td>
			</tr>
		<?php endforeach; endif; ?>
		</tbody>
	</table>

<br />

<div class="admin_bottom_button"><a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/submit_groups.php" onclick="window.open('<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/submit_groups.php','popup','width=900,height=900,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/friends.gif" style="margin-top:2px;"/><p style="margin:1px 0 0 3px;float:right;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_New_Group']; ?>
</p></a></div>
<div style="clear:both;"> </div>