<?php
/**
 * Template for Activity plugin: activity_profile - for user activity
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
 * @author    Hotaru CMS Team
 * @copyright Copyright (c) 2009 - 2013, Hotaru CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://www.hotarucms.org/
 */
?>

<h2><?php echo $h->lang['activity_title']; ?>
    <a href="<?php echo $h->url(array('page'=>'rss_activity', 'user'=>$h->vars['user_name']))?>" title="<?php echo $h->lang['activity_title_anchor_title']; ?>">
    <img src="<?php echo BASEURL; ?>content/themes/<?php echo THEME; ?>images/rss_16.png" width="16" height="16" alt="rss" /></a>
</h2>

<div id='activity'>
    <ul class='activity_items'>
        <?php 
            $act = new Activity();
            if ($h->vars['pagedResults']->items) { 
                foreach ($h->vars['pagedResults']->items as $action) {
                    $title = $act->postSafe($h, $action);
                    if (!$title) { continue; } // skip if postis buried or pending, postSafe returns title if safe
                    $action->title = $title;
                    
                    $user_id = $action->useract_userid;
                    $username = isset($action->user_username) ? $action->user_username : '';
        ?>
                    <li class='activity_item'>
                    
                        <?php if($h->isActive('avatar')) { ?>
                            <div class='activity_widget_avatar'>
                                <?php $h->setAvatar($user_id, 16); echo $h->linkAvatar(); ?>
                            </div>
                        <?php } ?>

			<?php if ($user_id == 0) { echo $h->lang['activity_anonymous']; } else {
			    echo "<a class='activity_user' href='" . $h->url(array('user' => $username)) . "'>" . $username . "</a>";
			}?>
                        
                        <div class='activity_content'>
                            <?php echo $act->activityContent($h, $action); ?>
                            <small>[<?php echo date('g:ia, M jS', strtotime($action->useract_date)); ?>]</small>
                        </div>
                    </li>
            <?php }
            }
        ?>
    </ul>
</div>
            
<?php if ($h->vars['pagedResults']) { echo $h->pageBar($h->vars['pagedResults']); } ?>

