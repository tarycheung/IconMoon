<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:43:09 CEST */ ?>

							<img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/manage_mods.gif" align="absmiddle"/> <a href="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_modules.php"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Module_Management']; ?>
</a><br/>
							<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_header_admin_main_links"), $this);?>
