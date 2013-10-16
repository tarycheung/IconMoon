<?php /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 10:28:33 CEST */ ?>

<?php if ($this->_vars['pagename'] == "groups"): ?>
	<div class="groupexplain">
		<div id="group_explain_inner">
			<div id="group_explain_description">
			<?php echo $this->_confs['PLIGG_Visual_Group_Explain']; ?>

			</div>
			<?php if ($this->_vars['group_allow'] == "1"): ?>
				<div id="create_group">
				<form>
					<input type="button" value="<?php echo $this->_confs['PLIGG_Visual_Submit_A_New_Group']; ?>
" onclick="window.location.href='<?php echo $this->_vars['URL_submit_groups']; ?>
'" style="padding:3px 5px;">
				</form>
				</div>
			<?php endif; ?>
			<div id="search_groups">
				<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/groups.php" method="get"
				<?php if ($this->_vars['urlmethod'] == 2): ?>
					onsubmit="document.location.href = '<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/groups/search/' + encodeURIComponent(this.keyword.value); return false;"
				<?php endif; ?>
				>
				<input type="hidden" name="view" value="search">
					<?php if ($this->_vars['get']['keyword'] != ""): ?>
						<?php $this->assign('searchboxtext', $this->_vars['get']['keyword']); ?>
					<?php else: ?>
						<?php $this->assign('searchboxtext', $this->_confs['PLIGG_Visual_Search_SearchDefaultText']); ?>			
					<?php endif; ?>
				<input type="text" name="keyword" class="field" value="<?php echo $this->_vars['searchboxtext']; ?>
" onfocus="if(this.value == '<?php echo $this->_vars['searchboxtext']; ?>
') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $this->_vars['searchboxtext']; ?>
';}">
				<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Group_Search_Groups']; ?>
" class="button">
				</form>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
<?php endif; ?>

<?php if ($this->_vars['get']['keyword']): ?>
    <?php if ($this->_vars['group_display']): ?>
		<h2><?php echo $this->_confs['PLIGG_Visual_Search_SearchResults']; ?>
 '<?php echo $this->_vars['search']; ?>
'</h2>
    <?php else: ?>
		<h2><?php echo $this->_confs['PLIGG_Visual_Search_NoResults']; ?>
 '<?php echo $this->_vars['search']; ?>
'</h2>
    <?php endif; ?>
<?php endif; ?>

<?php echo $this->_vars['group_display']; ?>

<div style="clear:both;"></div>
<?php echo $this->_vars['group_pagination']; ?>
