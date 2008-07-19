<?php

     /**
	 * Elgg Message board individual item display page
	 * 
	 * @package ElggMessageBoard
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
?>

<div class="messageboard"><!-- start of messageboard div -->
	
    <!-- display the user icon of the user that posted the message -->
    <div class="message_sender">	        
        <?php
            echo elgg_view("profile/icon",array('entity' => get_entity($vars['annotation']->owner_guid), 'size' => 'tiny'));
        ?>
    </div>
    
    <!-- display the user's name who posted and the date/time -->
    <p class="message_item_timestamp">
        <?php echo get_user($vars['annotation']->owner_guid)->username . " " . friendly_time($vars['annotation']->time_created); ?>
    </p>
    		
	<!-- output the actual comment -->
	<div class="message"><?php echo elgg_view("output/longtext",array("value" => $vars['annotation']->value)); ?></div>
		    
	<?php
               
        // if the user looking at the comment can edit, show the delete link
	    if ($vars['annotation']->canEdit()) {
    			    
    ?>
		    <p class="message_buttons">
		    
		    <a href=""><img src="<?php echo $vars['url']; ?>_graphics/icon_customise_remove.gif" title="delete" /></a>
		    
		        <?php

			        echo elgg_view("output/confirmlink",array(
														'href' => $vars['url'] . "action/messageboard/delete?annotation_id=" . $vars['annotation']->id,
														'text' => elgg_echo('delete'),
														'confirm' => elgg_echo('deleteconfirm'),
													));
		
		        ?>
		        
		        <?php
		            //if the message being looked at is owned by the current user, don't show the reply
		            if($vars['annotation']->owner_guid != $_SESSION['guid']){
    		            
    		            //get the message owner
    		            $get_user = get_user($vars['annotation']->owner_guid);
    		            //create the url to their messageboard
    		            $user_mb = "pg/messageboard/" . $get_user->username;
    		            
    		            echo "| <a href=\"" . $vars['url'] . "mod/messageboard/history.php?user=" . $get_user->guid ."\">history</a> | "; 
    		            
    		            echo "<a href=\"" . $vars['url'] . $user_mb . "\">reply on " . $get_user->username . "'s message board</a>";
    		            
		            }
		        ?>
		        
		    </p>
		
    <?php
        } //end of can edit if statement
	?>
		
</div><!-- end of messageboard div -->