<?php /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:47:43 CEST */ ?>

<h2><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/page.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Manage_Pages']; ?>
</h2>
<br />
	<table class="stripes" cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
				<th><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Submit_Title']; ?>
</th>
				<th style="width:80px;text-align:center;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Edit']; ?>
</th>
				<th style="width:80px;text-align:center;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Delete']; ?>
</th>
			</tr>
		</thead>
		<tbody>
		<?php echo $this->_vars['page_title']; ?>

		</tbody>
	</table>

<?php echo $this->_vars['page_text']; ?>


<div class="admin_bottom_button"><a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/submit_page.php" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Submit_New']; ?>
"><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/new_cat.gif" style="margin-top:2px;"/><p style="margin:1px 0 0 3px;float:right;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Submit_New']; ?>
</p></a></div>
<div style="clear:both;"> </div>