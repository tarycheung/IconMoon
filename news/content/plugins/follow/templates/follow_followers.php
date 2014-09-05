<?php
/**
 * Follow - Followers
 *
 * PHP version 5
 *
 * LICENSE: Hotaru CMS is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version. 
 *
 * Hotaru CMS is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * You should have received a copy of the GNU General Public License along 
 * with Hotaru CMS. If not, see http://www.gnu.org/licenses/.
 * 
 * @category  Content Management System
 * @package   HotaruCMS
 * @author    shibuya246 <admin@hotarucms.org>
 * @copyright Copyright (c) 2009 - 2013, Hotaru CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://www.hotarucms.org/
 */

?>

<?php

    $user = $h->cage->get->testUsername('user');	
    if (!$user) { $user = $h->currentUser->name; }

    // create a user object and fill it with user info (user being viewed)
    $h->vars['user'] = new UserAuth();
    $h->vars['user']->getUserBasic($h, 0, $user);

   
    // get type by url page or if not available then vars set by tab hook
    $page = $h->cage->get->testAlnumLines('page');
    if (!$page && isset($h->vars['follow_type'])) $page = $h->vars['follow_type'];
    if ($page == "following") {
        // followers  
	$follow_type = $h->lang["follow_list_following"];
        $query = $h->getFollowing($h->vars['user']->id, 'query');
        $h->vars['follow_count'] = $h->countFollowing($h->vars['user']->id);
        $h->vars['follow_list'] = $h->pagination($query, $h->vars['follow_count'], 20);
    } else {
        // following
	$follow_type = $h->lang["follow_list_followers"];
        $query = $h->getFollowers($h->vars['user']->id, 'query');
        $h->vars['follow_count'] = $h->countFollowers($h->vars['user']->id);
        $h->vars['follow_list'] = $h->pagination($query, $h->vars['follow_count'], 20);
        // how to also include the latest actvitiy for this person and a follow/unfollow button
    }

     $follow_settings = $h->getSerializedSettings();
?>

<div id="list_followers" class="users_content">

<h2><?php echo $follow_type . " (" . $h->vars['follow_count'] .")"; ?></h2>
    

<table class="table table-bordered follow_list">
    <tr class="info follow_list_headers">
        <td><?php echo $follow_type; ?></td>
        <td><?php echo $h->lang['follow_list_activity']; ?></td>
        <td>&nbsp;</td>
    </tr>
    
    <?php if (isset($h->vars['follow_list']->items)) { ?>

        <?php foreach ($h->vars['follow_list']->items as $user) { ?>
            <tr id="follow_user_<?php echo $user->user_id; ?>" class="follow_row">
            
                
                <td class="follow_user">		    
			 <?php if($h->isActive('avatar')) {
			     $h->setAvatar($user->user_id, 32);
			     echo $h->wrapAvatar();
			 } ?>
<!--		    <a href="<?php //echo $h->url(array('user'=>$user->user_username)); ?>">
			<?php //echo $user->user_username; ?>
		    </a>-->
		</td>
                                
                <td class="follow_activity">
                    <?php 
                    $action = $h->pluginHook('follow_activity', '', array($user->user_id)); 
                    
                    if (!$action) { echo "No activity yet."; } else {
                        $activity = new Activity();
                        echo $activity->activityContent($h, $action['Activity_follow_activity']);
                        if ($follow_settings['follow_show_time_date']) {
                            echo "<br /><small>[" . date('g:ia, M jS', strtotime($action['Activity_follow_activity']->useract_date)) . "]</small>";
                        }
                    }
                    ?>
                </td>                               

		<?php
		if ($user->user_id != $h->currentUser->id) {		    
		    $h->isFollowing($user->user_id)  == 0 ? $type = 'Follow' : $type = 'Unfollow';

		    echo '<td class="follow_update"><center>';
			if ($h->currentUser->loggedIn) {
			    echo '<input type="button" class="btn" name="'. $type. '_' . $user->user_id .'" id="' . $type . '_' . $user->user_id .'" value="' . $type .'">';
			}
		    echo '</center></td>';
		 }
		 else {
		     echo '<td class="follow_update"><center>You</center></td>';
		 }
		 ?>
            </tr>
        <?php } ?>
    
    <?php } else { ?>
        <tr><td colspan='4'><center><?php echo $h->lang['follow_no_followers']; ?></center></td></tr>
    <?php } ?>
    
</table>

    <?php echo $h->pageBar($h->vars['follow_list']); ?>
    
   
</div>


 <script type='text/javascript'>
    jQuery('document').ready(function($) {

    $(".follow_button").click(function(){

	    var button = $(this);
	    var array = $(this).attr('id').split('_');
            var user_id = array[array.length-1];
	    var type = array[array.length-2].toLowerCase();
            var formdata = 'action=' + type + '&user_id=' + user_id;
            var sendurl = BASEURL +"content/plugins/follow/templates/follow_update.php";

	    $.ajax(
		{
		type: 'post',
		url: sendurl,
		data: formdata,
		error: 	function(XMLHttpRequest, textStatus, errorThrown) {
				$(this).attr('value', 'error');
		},
		success: function(data, textStatus) { // success means it returned some form of json code to us. may be code with custom error msg
			if (data.error) {
			    $('#error_message').html(data.error);
			}
			else
			{			    
			    $(button).attr('value', data.result)
			    $(button).attr('id', data.result + '_' +user_id);
			    $(button).attr('name', data.result + '_' + user_id);
			}
		},
		dataType: "json"
	    });
	 });
    });
 

 </script>