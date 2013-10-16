<?php require_once('/Users/jjying/Dropbox/IconMoon/news/plugins/function.checkActionsTpl.php'); $this->register_function("checkActionsTpl", "tpl_function_checkActionsTpl");  /* V2.20 Template Lite, 8 March 2008. (c) Mark Dickenson, Jon Langevin. GNU LGPL. 2013-10-12 10:43:15 CEST */ ?>

<div id="profile"><div id="profile_content">
<?php if ($this->_vars['savemsg'] != ""): ?><p align=center><span class="saved"><?php echo $this->_vars['savemsg']; ?>
</span></p><?php endif; ?> 
<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_profile_info_start"), $this);?>
	<?php if ($this->_vars['UseAvatars'] != false): ?>
		<h2><?php echo $this->_confs['PLIGG_Visual_Profile_UploadAvatar2']; ?>
:</h2>
			<?php if ($this->_vars['user_avatar_source'] == "useruploaded"): ?>
				
				<form method="POST" enctype="multipart/form-data" name="image_upload_form" action="<?php echo $this->_vars['form_action']; ?>
">
					<input type="file" name="image_file" size="20">
					<input type="hidden" name="avatar" value="uploaded"/>
					<?php echo $this->_vars['hidden_token_profile_change']; ?>

					<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Profile_AvatarUpload']; ?>
" name="action" class="log2"><br>
				</form> 
			<?php endif; ?>	
	<?php endif; ?>
		
	<form action="" method="post" id="thisform">
		<?php echo $this->_vars['hidden_token_profile_change']; ?>

	<?php if ($this->_vars['UseAvatars'] != false): ?>
			<?php echo $this->_confs['PLIGG_Visual_Profile_CurrentAvatar']; ?>

			<span id="ls_avatar-large"><img src="<?php echo $this->_vars['Avatar_ImgLarge']; ?>
" alt="Avatar"/></span>
			<span id="ls_avatar-small"><img src="<?php echo $this->_vars['Avatar_ImgSmall']; ?>
" alt="Avatar"/></span>
			<br />
			<input type="radio" name="avatarsource" value="" <?php if ($this->_vars['user_avatar_source'] == ""): ?>CHECKED<?php endif; ?>> <?php echo $this->_confs['PLIGG_Visual_Profile_UseDefaultAvatar']; ?>
<br />
			<input type="radio" name="avatarsource" value="useruploaded" <?php if ($this->_vars['user_avatar_source'] == "useruploaded"): ?>CHECKED<?php endif; ?>> <?php echo $this->_confs['PLIGG_Visual_Profile_UploadAvatar']; ?>
<br/>
			<input type=submit name="save_profile" value="<?php echo $this->_confs['PLIGG_Visual_Profile_Save']; ?>
" class="log2">					
	<?php endif; ?>

<table style="border:none">

	<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_profile_center_fields"), $this);?>

<br /><br />
<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_profile_info_middle"), $this);?>
	<tr>
		<td width="250px" align="right">
			<h2>Personal Information</h2>
		</td>
		<td width="300px" align="right">
			<h2>Communication</h2>
		</td>
	</tr>
	
	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_Profile_RealName']; ?>
:</label>
			<input type="text" name="names" id="names" tabindex="1" value="<?php echo $this->_vars['user_names']; ?>
"><br />&nbsp;
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_AIM']; ?>
:</label>
			<input type="text" name="aim" id="aim" tabindex="2" value="<?php echo $this->_vars['user_aim']; ?>
">
		</td>
	</tr>
	
	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_Profile_Email']; ?>
:</label>
			<input type="text" name="email" id="email" tabindex="3" value="<?php echo $this->_vars['user_email']; ?>
"> <br /><em><?php echo $this->_confs['PLIGG_Visual_Profile_OnlyAdmins']; ?>
</em>
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_MSN']; ?>
:</label>
			<input type="text" name="msn" id="msn" tabindex="4" value="<?php echo $this->_vars['user_msn']; ?>
">
		</td>
	</tr>

	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_PublicEmail']; ?>
:</label>
			<input type="text" name="public_email" id="public_email" tabindex="5" value="<?php echo $this->_vars['user_publicemail']; ?>
"><br />&nbsp;
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Yahoo']; ?>
:</label>
			<input type="text" name="yahoo" id="yahoo" tabindex="6" value="<?php echo $this->_vars['user_yahoo']; ?>
">
		</td>
	</tr>

	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Homepage']; ?>
:</label>
			<input type="text" name="url" id="url" tabindex="7" value="<?php echo $this->_vars['user_url']; ?>
"><br />&nbsp;
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_GTalk']; ?>
:</label>
			<input type="text" name="gtalk" id="gtalk" tabindex="8" value="<?php echo $this->_vars['user_gtalk']; ?>
">
		</td>
	</tr>

	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_Profile_Location']; ?>
:</label>
			<input type="text" name="location" id="location" tabindex="9" value="<?php echo $this->_vars['user_location']; ?>
"><br />&nbsp;
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Skype']; ?>
:</label>
			<input type="text" name="skype" id="skype" tabindex="10" value="<?php echo $this->_vars['user_skype']; ?>
">
		</td>
	</tr>

	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_Profile_Occupation']; ?>
:</label>
			<input type="text" name="occupation" id="occupation" tabindex="11" value="<?php echo $this->_vars['user_occupation']; ?>
">
		</td>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_IRC']; ?>
: <?php echo $this->_confs['PLIGG_Visual_Profile_IRC_Instruct']; ?>
</label>
			<input type="text" name="irc" id="irc" tabindex="12" value="<?php echo $this->_vars['user_irc']; ?>
">
		</td>	
	</tr>

<?php 
if (user_language)
{
 ?>
	<tr>
		<td align="right">
			<label for="name" accesskey="1"><?php echo $this->_confs['PLIGG_Visual_User_Profile_Language']; ?>
:</label>
			<select name='language'>
				<?php if (count((array)$this->_vars['languages'])):  foreach ((array)$this->_vars['languages'] as $this->_vars['lang']): ?>
				<option <?php if ($this->_vars['lang'] == $this->_vars['user_language']): ?>selected<?php endif; ?>><?php echo $this->_vars['lang']; ?>
</option>
				<?php endforeach; endif; ?>
			</select>
		</td>
		<td align="right">
		</td>	
	</tr>
<?php 
}
 ?>
		
</table>
<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_profile_end"), $this);?>
<div class="linespacer">&nbsp;</div>

<h2><?php echo $this->_confs['PLIGG_Visual_Profile_ChangePass']; ?>
</h2>

<table style="border:none">
	<tr>
		<td width="250px" align="right">
			<label><?php echo $this->_confs['PLIGG_Visual_Profile_OldPass']; ?>
:</label><br />
			<input type="password" id="oldpassword" name="oldpassword" size="25" tabindex="13"/>
		</td>
		<td width="300px" align="right">
			<label><?php echo $this->_confs['PLIGG_Visual_Profile_NewPass']; ?>
:</label><br />
			<input type="password" id="newpassword" name="newpassword" size="25" tabindex="14"/>
		</td>
	</tr>

	<tr>
		<td>
		</td>
		<td align="right">
			<label><?php echo $this->_confs['PLIGG_Visual_Profile_VerifyNewPass']; ?>
:</label><br />
			<input type="password" id="verify" name="newpassword2" size="25" tabindex="15"/>
		</td>
	</tr>

	<input type="hidden" name="process" value="1">
	<input type="hidden" name="user_id" value="<?php echo $this->_vars['user_id']; ?>
">	
</table>
	
<br />

<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_profile_end"), $this);?>
<input type="submit" name="save_profile" value="<?php echo $this->_confs['PLIGG_Visual_Profile_Save']; ?>
" class="log2" tabindex="16"></p>

</form>

</div></div>