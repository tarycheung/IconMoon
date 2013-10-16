<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:52:05 CEST */ ?>

<h1><?php echo $this->_confs['PLIGG_Visual_Submit1_Header']; ?>
</h1>
<div id="leftcol-superwide">
	
	<div id="submit">
		<div id="submit_content">
			<h2><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct']; ?>
:</h2>
			<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_submit_step1_start"), $this);?>
			<ul class="instructions">
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_1A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_1A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_1B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_2A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_2A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_2B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_3A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_3A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_3B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_4A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_4A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_4B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_5A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_5A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_5B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_6A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_6A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_6B']; ?>
</li><?php endif; ?>
				<?php if ($this->_confs['PLIGG_Visual_Submit1_Instruct_7A'] != ''): ?><li><strong><?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_7A']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_Submit1_Instruct_7B']; ?>
</li><?php endif; ?>
			</ul>
			<div id="bookmarklet">
				<h2><?php echo $this->_confs['PLIGG_Visual_User_Profile_Bookmarklet_Title']; ?>
</h2>
					<p><?php echo $this->_confs['PLIGG_Visual_User_Profile_Bookmarklet_Title_1']; ?>
 <?php echo $this->_confs['PLIGG_Visual_Name']; ?>
.<?php echo $this->_confs['PLIGG_Visual_User_Profile_Bookmarklet_Title_2']; ?>
<br />
					<br /><strong><?php echo $this->_confs['PLIGG_Visual_User_Profile_IE']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_User_Profile_IE_1']; ?>

					<br /><strong><?php echo $this->_confs['PLIGG_Visual_User_Profile_Firefox']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_User_Profile_Firefox_1']; ?>

					<br /><strong><?php echo $this->_confs['PLIGG_Visual_User_Profile_Opera']; ?>
:</strong> <?php echo $this->_confs['PLIGG_Visual_User_Profile_Opera_1']; ?>

					<br /><br /><strong><?php echo $this->_confs['PLIGG_Visual_User_Profile_The_Bookmarklet']; ?>
: <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("bookmarklet.tpl", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?></strong>
					</p>
			</div>
			<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_submit_step1_middle"), $this);?>
			<br />
			<h2><?php echo $this->_confs['PLIGG_Visual_Submit1_NewsSource']; ?>
</h2>
			<form action="<?php echo $this->_vars['URL_submit']; ?>
" method="post" id="thisform">
				<label for="url"><?php echo $this->_confs['PLIGG_Visual_Submit1_NewsURL']; ?>
:</label>
				<input type="text" name="url" id="url" value="http://" size="55" />
				
				<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_submit_step1_end"), $this);?>
				
				<input type="hidden" name="phase" value=1>
				<input type="hidden" name="randkey" value="<?php echo $this->_vars['submit_rand']; ?>
">
				<input type="hidden" name="id" value="c_1">
				<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Submit1_Continue']; ?>
" class="submit-s" />
			</form>
			<br />
			<?php if ($this->_vars['Submit_Require_A_URL'] != 1):  echo $this->_confs['PLIGG_Visual_Submit_Editorial'];  endif; ?>

		</div>
	</div>