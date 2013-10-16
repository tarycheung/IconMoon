<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/modifier.repeat_count.php'); $this->register_modifier("repeat_count", "tpl_modifier_repeat_count");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:47:38 CEST */ ?>

<h1><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/manage_cat.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Manage']; ?>
</h1>
<br />

<?php echo '
<script> 
function catOnLoad()
{
	new Accordian(\'basic-accordian\',5,\'header_highlight\'); 
}
window.onload = catOnLoad;
function showdel(id)
{
    document.getElementById(\'del\'+id).style.display=\'block\'; 
    var content = document.getElementById(\'test\'+id+\'-content\');
    var height = content.style.height;
    content.style.height = (parseInt(height.substr(0,height.indexOf(\'p\')))+180)+\'px\';
}
</script>
'; ?>
 
 
<div id="basic-accordian" ><!--Parent of the Accordion--> 
 
<div style="width:125px; float:left"> 
  <?php if (isset($this->_sections['thecat'])) unset($this->_sections['thecat']);
$this->_sections['thecat']['name'] = 'thecat';
$this->_sections['thecat']['loop'] = is_array($this->_vars['cat_array']) ? count($this->_vars['cat_array']) : max(0, (int)$this->_vars['cat_array']);
$this->_sections['thecat']['start'] = (int)1;
$this->_sections['thecat']['show'] = true;
$this->_sections['thecat']['max'] = $this->_sections['thecat']['loop'];
$this->_sections['thecat']['step'] = 1;
if ($this->_sections['thecat']['start'] < 0)
	$this->_sections['thecat']['start'] = max($this->_sections['thecat']['step'] > 0 ? 0 : -1, $this->_sections['thecat']['loop'] + $this->_sections['thecat']['start']);
else
	$this->_sections['thecat']['start'] = min($this->_sections['thecat']['start'], $this->_sections['thecat']['step'] > 0 ? $this->_sections['thecat']['loop'] : $this->_sections['thecat']['loop']-1);
if ($this->_sections['thecat']['show']) {
	$this->_sections['thecat']['total'] = min(ceil(($this->_sections['thecat']['step'] > 0 ? $this->_sections['thecat']['loop'] - $this->_sections['thecat']['start'] : $this->_sections['thecat']['start']+1)/abs($this->_sections['thecat']['step'])), $this->_sections['thecat']['max']);
	if ($this->_sections['thecat']['total'] == 0)
		$this->_sections['thecat']['show'] = false;
} else
	$this->_sections['thecat']['total'] = 0;
if ($this->_sections['thecat']['show']):

		for ($this->_sections['thecat']['index'] = $this->_sections['thecat']['start'], $this->_sections['thecat']['iteration'] = 1;
			 $this->_sections['thecat']['iteration'] <= $this->_sections['thecat']['total'];
			 $this->_sections['thecat']['index'] += $this->_sections['thecat']['step'], $this->_sections['thecat']['iteration']++):
$this->_sections['thecat']['rownum'] = $this->_sections['thecat']['iteration'];
$this->_sections['thecat']['index_prev'] = $this->_sections['thecat']['index'] - $this->_sections['thecat']['step'];
$this->_sections['thecat']['index_next'] = $this->_sections['thecat']['index'] + $this->_sections['thecat']['step'];
$this->_sections['thecat']['first']	  = ($this->_sections['thecat']['iteration'] == 1);
$this->_sections['thecat']['last']	   = ($this->_sections['thecat']['iteration'] == $this->_sections['thecat']['total']);
?>
  <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] != 0): ?>
  	<div id="test<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
-header" class="accordion_headings <?php if ($this->_sections['thecat']['index'] == 1): ?>header_highlight<?php endif; ?>" ><?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['name']; ?>
</div> 
  <?php endif; ?>
  <?php endfor; endif; ?>
  <br />
  <div id="test0-header" class="accordion_headings" style="background:#129c1f"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Add']; ?>
</div> 
</div> 
 
<div style="float:right; width:650px;"> 
  <?php if (isset($this->_sections['thecat'])) unset($this->_sections['thecat']);
$this->_sections['thecat']['name'] = 'thecat';
$this->_sections['thecat']['loop'] = is_array($this->_vars['cat_array']) ? count($this->_vars['cat_array']) : max(0, (int)$this->_vars['cat_array']);
$this->_sections['thecat']['start'] = (int)1;
$this->_sections['thecat']['show'] = true;
$this->_sections['thecat']['max'] = $this->_sections['thecat']['loop'];
$this->_sections['thecat']['step'] = 1;
if ($this->_sections['thecat']['start'] < 0)
	$this->_sections['thecat']['start'] = max($this->_sections['thecat']['step'] > 0 ? 0 : -1, $this->_sections['thecat']['loop'] + $this->_sections['thecat']['start']);
else
	$this->_sections['thecat']['start'] = min($this->_sections['thecat']['start'], $this->_sections['thecat']['step'] > 0 ? $this->_sections['thecat']['loop'] : $this->_sections['thecat']['loop']-1);
if ($this->_sections['thecat']['show']) {
	$this->_sections['thecat']['total'] = min(ceil(($this->_sections['thecat']['step'] > 0 ? $this->_sections['thecat']['loop'] - $this->_sections['thecat']['start'] : $this->_sections['thecat']['start']+1)/abs($this->_sections['thecat']['step'])), $this->_sections['thecat']['max']);
	if ($this->_sections['thecat']['total'] == 0)
		$this->_sections['thecat']['show'] = false;
} else
	$this->_sections['thecat']['total'] = 0;
if ($this->_sections['thecat']['show']):

		for ($this->_sections['thecat']['index'] = $this->_sections['thecat']['start'], $this->_sections['thecat']['iteration'] = 1;
			 $this->_sections['thecat']['iteration'] <= $this->_sections['thecat']['total'];
			 $this->_sections['thecat']['index'] += $this->_sections['thecat']['step'], $this->_sections['thecat']['iteration']++):
$this->_sections['thecat']['rownum'] = $this->_sections['thecat']['iteration'];
$this->_sections['thecat']['index_prev'] = $this->_sections['thecat']['index'] - $this->_sections['thecat']['step'];
$this->_sections['thecat']['index_next'] = $this->_sections['thecat']['index'] + $this->_sections['thecat']['step'];
$this->_sections['thecat']['first']	  = ($this->_sections['thecat']['iteration'] == 1);
$this->_sections['thecat']['last']	   = ($this->_sections['thecat']['iteration'] == $this->_sections['thecat']['total']);
?>
  <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] != 0): ?>
  <div id="test<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
-content"> 
	<div class="accordion_child"> 
	<form method='post'>
	<?php echo $this->_vars['hidden_token_category_manager']; ?>

	<input type='hidden' name='auto_id' value='<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
'>
	<input type='hidden' name='action' value='save'>
    	<table style="width:600px" border="0"> 
	<tbody> 
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Name']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="name" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['name']; ?>
" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_URL']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="safename" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['safename']; ?>
" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_ID']; ?>
</td> 
			<td><?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['id']; ?>
</td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Meta_Desc']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="description" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['description']; ?>
" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Meta_Keywords']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="keywords" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['keywords']; ?>
" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Author_Level']; ?>
</td> 
			<td> 
			<select name="level" style="padding:3px;width:100px"> 
				<option value="normal" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['authorlevel'] == 'normal'): ?>selected<?php endif; ?>>Normal</option> 
				<option value="admin" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['authorlevel'] == 'admin'): ?>selected<?php endif; ?>>Admin</option> 
				<option value="god" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['authorlevel'] == 'god'): ?>selected<?php endif; ?>>God</option> 
			</select> 
			</td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Author_Group']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="group" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['authorgroup']; ?>
" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Votes']; ?>
</td> 
			<td><input size="3" style="padding:3px" name="votes" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['votes']; ?>
" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Karma']; ?>
</td> 
			<td><input size="3" style="padding:3px" name="karma" value="<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['karma']; ?>
" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Parent']; ?>
</td> 
			<td> 
			<select name="parent" style="padding:3px"> 
			  <option value="0">--</option> 
			  <?php if (count((array)$this->_vars['cat_array'])):  foreach ((array)$this->_vars['cat_array'] as $this->_vars['cat']): ?>
			      <?php if ($this->_vars['cat']['auto_id'] != 0 && $this->_vars['cat']['auto_id'] != $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] && $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] != $this->_vars['cat']['parent']): ?>
				<option value="<?php echo $this->_vars['cat']['auto_id']; ?>
" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['parent'] == $this->_vars['cat']['auto_id']): ?>selected<?php endif; ?>><?php echo $this->_vars['cat']['name']; ?>
</option> 
			      <?php endif; ?>
			  <?php endforeach; endif; ?>
			</select> 
			</td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><input onclick="showdel(<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
)" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Delete']; ?>
" <?php if (sizeof ( $this->_vars['cat_array'] ) <= 2): ?>disabled<?php endif; ?> type="button">
			</td> 
			<td valign='top'><input value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Update']; ?>
" type="submit"></td> 
		</tr> 

	</tbody> 
	</table> 
	
	<div id="del<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
" class="deletecategory" style="display:none;">
		<p><strong><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Select']; ?>
</strong></p>
		<input type="radio" name="sub" value="move" onclick="this.form.delete1.disabled=false;"> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Move']; ?>
:
			<select name="move">
			<?php if (count((array)$this->_vars['cat_array'])):  foreach ((array)$this->_vars['cat_array'] as $this->_vars['cat']): ?>
			  <?php if ($this->_vars['cat']['auto_id'] != 0 && $this->_vars['cat']['auto_id'] != $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']): ?>
			<option value="<?php echo $this->_vars['cat']['auto_id']; ?>
"><?php echo $this->_vars['cat']['name']; ?>
</option> 
			  <?php endif; ?>
			<?php endforeach; endif; ?>
			</select><br />
		<input type="radio" name="sub" value="delete" onclick="this.form.delete1.disabled=false;"> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Delete_Stories']; ?>
<br /><br />

		<input type="radio" name="sub1" value="move" checked> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Subcategory_Move']; ?>
<br />
		<input type="radio" name="sub1" value="delete"> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Subcategory_Delete']; ?>
<br /><br />

		<input onclick="if (confirm('<?php echo $this->_confs['PLIGG_Visual_View_User_Reset_Pass_Confirm']; ?>
')) document.location.href='admin_categories.php?action=remove&id=<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
&sub='+(this.form.sub[0].checked ? 'move' : 'delete')+'&move='+this.form.move.options[this.form.move.selectedIndex].value+'&sub1='+(this.form.sub1[0].checked ? 'move' : 'delete')+'&token='+this.form.token.value;" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Delete']; ?>
" disabled name='delete1' type="button">
		<input onclick="document.getElementById('del<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
').style.display='none';" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Cancel']; ?>
" type="button">
	</div>
	
	</form> 
    </div> 
  </div> 
  <?php endif; ?>
  <?php endfor; endif; ?>

  <div id="test0-content"> 
	<div class="accordion_child"> 
	<form method='post'>
	<?php echo $this->_vars['hidden_token_category_manager']; ?>

	<input type='hidden' name='action' value='save'>
    	<table style="width:600px" border="0"> 
	<tbody> 
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Name']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="name" value="new category" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_URL']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="safename" value="" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Meta_Desc']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="description" value="" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Meta_Keywords']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="keywords" value="" type="text"></td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Author_Level']; ?>
</td> 
			<td> 
			<select name="level" style="padding:3px;width:100px"> 
				<option value="normal">Normal</option> 
				<option value="admin">Admin</option> 
				<option value="god">God</option> 
			</select> 
			</td> 
		</tr> 

		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Author_Group']; ?>
</td> 
			<td><input size="55" style="padding:3px" name="group" value="" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Votes']; ?>
</td> 
			<td><input size="3" style="padding:3px" name="votes" value="" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Karma']; ?>
</td> 
			<td><input size="3" style="padding:3px" name="karma" value="" type="text"></td> 
		</tr> 
		
		<tr> 
			<td style="font-weight:bold" width="200" height="26"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Parent']; ?>
</td> 
			<td> 
			<select name="parent" style="padding:3px"> 
			  <option value="0">--</option> 
			  <?php if (count((array)$this->_vars['cat_array'])):  foreach ((array)$this->_vars['cat_array'] as $this->_vars['cat']): ?>
			      <?php if ($this->_vars['cat']['auto_id'] != 0): ?>
				<option value="<?php echo $this->_vars['cat']['auto_id']; ?>
"><?php echo $this->_vars['cat']['name']; ?>
</option> 
			      <?php endif; ?>
			  <?php endforeach; endif; ?>
			</select> 
			</td> 
		</tr> 

		<tr> 
			<td><input value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Add']; ?>
" type="submit"></td> 
		</tr> 

	</tbody> 
	</table> 
	</form> 
    </div> 
  </div> 
</div> 

</div><!--End of accordion parent--> 

<div style="clear:both;margin-top:50px;"> 
	<hr />
	<h2><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Order']; ?>
:</h2>
	<p><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Category_Order_Description']; ?>
</p>
	<ul> 
	<?php if (isset($this->_sections['thecat'])) unset($this->_sections['thecat']);
$this->_sections['thecat']['name'] = 'thecat';
$this->_sections['thecat']['loop'] = is_array($this->_vars['cat_array']) ? count($this->_vars['cat_array']) : max(0, (int)$this->_vars['cat_array']);
$this->_sections['thecat']['show'] = true;
$this->_sections['thecat']['max'] = $this->_sections['thecat']['loop'];
$this->_sections['thecat']['step'] = 1;
$this->_sections['thecat']['start'] = $this->_sections['thecat']['step'] > 0 ? 0 : $this->_sections['thecat']['loop']-1;
if ($this->_sections['thecat']['show']) {
	$this->_sections['thecat']['total'] = $this->_sections['thecat']['loop'];
	if ($this->_sections['thecat']['total'] == 0)
		$this->_sections['thecat']['show'] = false;
} else
	$this->_sections['thecat']['total'] = 0;
if ($this->_sections['thecat']['show']):

		for ($this->_sections['thecat']['index'] = $this->_sections['thecat']['start'], $this->_sections['thecat']['iteration'] = 1;
			 $this->_sections['thecat']['iteration'] <= $this->_sections['thecat']['total'];
			 $this->_sections['thecat']['index'] += $this->_sections['thecat']['step'], $this->_sections['thecat']['iteration']++):
$this->_sections['thecat']['rownum'] = $this->_sections['thecat']['iteration'];
$this->_sections['thecat']['index_prev'] = $this->_sections['thecat']['index'] - $this->_sections['thecat']['step'];
$this->_sections['thecat']['index_next'] = $this->_sections['thecat']['index'] + $this->_sections['thecat']['step'];
$this->_sections['thecat']['first']	  = ($this->_sections['thecat']['iteration'] == 1);
$this->_sections['thecat']['last']	   = ($this->_sections['thecat']['iteration'] == $this->_sections['thecat']['total']);
?>
	  <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] != 0): ?>
	  <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount'] < $this->_vars['submit_lastspacer']): ?>
	   	<?php echo $this->_run_modifier($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacerdiff'], 'repeat_count', 'plugin', 1, '</ul>'); ?>

	  <?php endif; ?>
	  <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount'] > $this->_vars['submit_lastspacer']): ?><ul></li><?php endif; ?>

	  <li id='cat<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
'><?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['name']; ?>
 
		<input value="Up" type="image" src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/cat_up.gif" id='up<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
' onclick="moveup(<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
)" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['first']): ?>style='display:none;'<?php endif; ?>>
		<input value="Down" type="image" src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/cat_down.gif" id='down<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
' onclick="movedown(<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
)" <?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['last']): ?>style='display:none;'<?php endif; ?>>

	  <?php $this->assign('submit_lastspacer', $this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount']); ?>
	  <?php endif; ?>
	<?php endfor; endif; ?>
	</ul> 
</div> 

<hr />
<h2>URL Method 2</h2>
<a href="admin_categories.php?action=htaccess" rel="width:250,height:250" class="mb" target="_blank"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_URL_Method_2_Click']; ?>
</a> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_URL_Method_2_Rename']; ?>

<br />



<hr />
<div class="admin_bottom_button"><a href="admin_categories.php?action=reset"><?php echo $this->_confs['PLIGG_Visual_Categories_Reset']; ?>
</a></div>
<div style="clear:both;"> </div>

<br /><br />