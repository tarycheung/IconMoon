<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:42:32 CEST */ ?>

<br clear="all" />
<!-- START FOOTER -->
		<div id="footer">
			<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_footer_start"), $this);?>
        	<span class="subtext"> Copyright &copy; <?php  echo date('Y');  ?> <?php echo $this->_confs['PLIGG_Visual_Name']; ?>
 
			| Pligg <a href="http://www.pligg.com/" target="_blank">Content Management System</a> 
			| <a href="http://www.pligg.com/hosting/" target="_blank">Cheap Web Hosting</a> 
			| <a href="<?php echo $this->_vars['URL_advancedsearch']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Search_Advanced']; ?>
</a> 
			<?php if ($this->_vars['URL_rss_page']): ?>
			<!-- START RSS -->
			| <a href="<?php echo $this->_vars['URL_rss_page']; ?>
" target="_blank">
				<img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/<?php echo $this->_vars['the_template']; ?>
/images/rss.gif" width="12px" height="12px" align="top" border="0" alt="RSS" /> RSS
			</a>
			<!-- END RSS -->
			<?php endif; ?>
			
			| <a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/rssfeeds.php"><?php echo $this->_confs['PLIGG_Visual_RSS_Feeds']; ?>
</a> <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_footer_end"), $this);?></span>
        </div>
<!-- END FOOTER --> 
