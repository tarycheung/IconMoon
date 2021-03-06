<?php
/**
 * Template for Activity plugin: activity_page
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

<?php if (1==0) { ?>
<h3><?php echo $h->lang['activity_title']; ?>
    <a href="<?php echo $h->url(array('page'=>'rss_activity'))?>" title="<?php echo $h->lang['activity_title_anchor_title']; ?>">
    <img src="<?php echo BASEURL; ?>content/themes/<?php echo THEME; ?>images/rss_16.png" width="16" height="16" alt="rss" /></a>
</h3>
<?php } ?>


<?php 
$act = new Activity();
if ($h->vars['pagedResults']->items) { 
    foreach ($h->vars['pagedResults']->items as $action) {
        $title = $act->postSafe($h, $action);
        if (!$title) { continue; } // skip if postis buried or pending, postSafe returns title if safe
        $action->title = $title;
        
        $user_id = $action->useract_userid;
        $username = isset($action->user_username) ? $action->user_username : '';

        switch ($action->useract_key) {
            case 'post':
                $label = 'label-blue'; 
                break;            
            case 'vote':
                $label = 'label-green'; 
                break;
            case 'comment':
                $label = "label-orange";
                break;
            default:
                $label = 'label-gray';
                break;
        }
        ?>

        <li class="info-box gray" id="activity_li_<?php echo $action->useract_id; ?>">
            <div class="avatarBox">

                <?php if($h->isActive('avatar')) { ?>
                            <div class='avatar_small'>
                                <?php $h->setAvatar($user_id, 32, 'g', 'img-circle'); echo $h->linkAvatar(); ?>
                            </div>
                        <?php } ?>

            </div>
            <div class="info">
              <span class="name">
                  <span class="label <?php echo $label; ?>"><?php echo strtoupper($action->useract_key); ?></span> 
                  <strong class="indent">
                      <?php if ($user_id == 0) { echo $h->lang['activity_anonymous']; } else {
                            echo "<a class='activity_user' href='" . $h->url(array('user' => $username)) . "'>" . $username . "</a>";
                        }?>
                  </strong> <?php echo $act->activityContent($h, $action); ?>

              </span>
              <span class="time pull-right"><i class="icon-time"></i> <?php echo time_ago($action->useract_date); ?></span>
            </div>
          </li>          

    <?php }
}
?>