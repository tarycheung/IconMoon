<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:42:32 CEST */ ?>

<!-- START ABOUT -->
        	<div class="headline">
            	<div class="sectiontitle"><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/page.php?page=about"><?php echo $this->_confs['PLIGG_Visual_What_Is_Pligg']; ?>
</a></div>
            </div>
            <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_about_start"), $this);?>
            <div id="aboutcontent">
                <?php echo $this->_confs['PLIGG_Visual_What_Is_Pligg_Text']; ?>

                <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_about_end"), $this);?>
            </div>
<!-- END ABOUT -->