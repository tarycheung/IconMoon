<?php /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 09:42:35 CEST */ ?>

<?php $this->config_load(admin_language_lang_conf, null, null); ?>
<li><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/module.php?module=admin_language" <?php if ($this->_vars['modulename'] == "admin_language"): ?>class="navcur"<?php else: ?>class="nav"<?php endif; ?> ><?php echo $this->_confs['PLIGG_Admin_Language_Menu']; ?>
</a></li>
<?php $this->config_load(admin_language_pligg_lang_conf, null, null); ?>
