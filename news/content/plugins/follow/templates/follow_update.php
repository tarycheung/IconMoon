<?php
/**
 * Perform ajax request for Follow
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


    require_once($_SERVER['DOCUMENT_ROOT'] . '/functions/funcs.files.php');
    $h = startHotaru();

    require_once(PLUGINS . 'follow/follow.php');
    $Follow = new Follow($h);
   
    $action = $h->cage->post->testAlnumLines('action');  

    $user_id = $h->cage->post->testInt('user_id');
    switch ($action) {
	case "unfollow":
	    $h->unfollow($user_id);
	    break;
	case "follow":
	    $h->follow($user_id);
	    break;
    }
    
    if ($h->isFollowing($user_id)) { echo json_encode(array('result'=>'Unfollow')); } else { echo json_encode(array('result'=>'Follow')); }
    exit; // This is ajax call to stop here, just in case we are thinking of printing anything else out below

?>