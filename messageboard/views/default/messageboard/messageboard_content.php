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
    <div style="float:left;width:60px;">	        
        <?php
            echo elgg_view("profile/icon",array('entity' => get_entity($vars['annotation']->owner_guid), 'size' => 'small'));
        ?>
    </div>
    
    <!-- display the user's name who posted and the date/time -->
    <p>
        <?php echo get_user($vars['annotation']->owner_guid)->username . " " . friendly_time($vars['annotation']->time_created); ?>
    </p>
    		
	<!-- output the actual comment -->
	<p><?php echo elgg_view("output/longtext",array("value" => $vars['annotation']->value)); ?></p>
		    
	<?php
               
        // if the user looking at the comment can edit, show the delete link
	    if ($vars['annotation']->canEdit()) {
    			    
    ?>
		    <p>
		        <?php

			        echo elgg_view("output/confirmlink",array(
														'href' => $vars['url'] . "action/messageboard/delete?annotation_id=" . $vars['annotation']->id,
														'text' => elgg_echo('delete'),
														'confirm' => elgg_echo('deleteconfirm'),
													));
		
		        ?>
		        <a href="">history</a>
		        
		        <?php
		            //if the message being looked at is owned by the current user, don't show the reply
		            if($vars['annotation']->owner_guid != $_SESSION['guid']){
    		            
    		            //get the message owner
    		            $get_user = get_user($vars['annotation']->owner_guid);
    		            //create the url to their messageboard
    		            $user_mb = "pg/messageboard/" . $get_user->username;
    		            
    		            echo "<a href=\"" . $vars['url'] . $user_mb . "\">reply on " . $get_user->username . "'s message board</a>";
    		            
		            }
		        ?>
		        
		    </p>
		
    <?php
        } //end of can edit if statement
	?>
		
</div><!-- end of messageboard div -->