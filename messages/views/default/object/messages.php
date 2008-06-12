<?php

	/**
	 * Elgg messages individual view
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * 
	 * @uses $vars['entity'] Optionally, the message to view
	 * @uses get_input('type') If the user accesses the message from their sentbox, this variable is passed
	 * and used to make sure the correct icon and name is displayed
	 */
	 
    // set some variables to use below
	if(get_input("type") == "sent"){
    	
        // send back to the users sentbox
        $url = $vars['url'] . "mod/messages/sent.php";
        
        //this is used on the delete link so we know which type of message it is 
        $type = "sent";
        
    } else {
        
        //send back to the users inbox
        $url = $vars['url'] . "pg/messages/" . $vars['entity']->getOwnerEntity()->username;
        
        //this is used on the delete link so we know which type of message it is 
        $type = "inbox";
        
    }
	 
    if (isset($vars['entity'])) {
    		
?>
    <!-- get the correct return url -->
    <div id="messages_return"><!-- start of messages_return div -->
         <p><a href="<?php echo $url; ?>">back to messages</a></p>
    </div><!-- end of messages_return div -->
    
    <div class="messages_single"><!-- start of the message div -->
    
        <div class="messages_single_icon"><!-- start of the message_user_icon div -->
            <!-- get the user icon, name and date -->
            <p>
            <?php
                // we need a different user icon and name depending on whether the user is reading the message
                // from their inbox or sentbox. If it is the inbox, then the icon and name will be the person who sent
                // the message. If it is the sentbox, the icon and name will be the user the message was sent to
                if($type == "sent"){
                    //get an instance of the user who the message has been sent to so we can access the name and icon
                    $user_object = get_entity($vars['entity']->toId);
                    //get the icon
                    echo "To:<br />" . elgg_view("profile/icon",array('entity' => $user_object, 'size' => 'medium'));
                    //get the name
                    echo "<br />" . $user_object->name . "<br />";
                }else{
                    //get the icon
                    echo "From:<br />" . elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'medium'));
                    //get the name
                    echo "<br />" . $vars['entity']->getOwnerEntity()->name . "<br />";
                }
            ?>
            <!-- get the time the message was sent -->
            <?php echo date("F j, g:i a",$vars['entity']->time_created);	?>
            </p>
        </div><!-- end of the message_user_icon div -->
        
        <div class="message_body"><!-- start of div message_body -->
        
        <?php
		    //if the message is a reply, display the message the reply was for
		    //I need to figure out how to get the description out using -> (anyone?)
		    if($main_message = $vars['entity']->getEntitiesFromRelationship("reply")){
        		
    		    if($type == "sent"){
        		    echo "<div class='previous_message'><p>Original message:</p>";
    		    }else{
    		        echo "<div class='previous_message'><p>Your message:</p>";
		        }
		        
    		    echo $main_message[0][description] . "</div>";
        			
    	    }
    	?>
        
        <!-- display the title -->
        <div class="actiontitle">
		<h3><?php echo $vars['entity']->title; ?></h3>
		</div>
		
		<!-- display the message -->
		<div class="messagebody">
		<p><?php echo $vars['entity']->description; ?></p>
		</div>
		
		<!-- display the edit options, reply and delete -->
		<div class="message_options"><!-- start of the message_options div -->
		    <p><?php if($type != "sent")echo "<div class='message_reply'><a href=\"{$vars['url']}mod/messages/reply.php?message={$vars['entity']->getGUID()}\">reply</a></div> - "; ?> <?php echo elgg_view("output/confirmlink", array(
																'href' => $vars['url'] . "action_handler.php?action=messages/delete&message_id=" . $vars['entity']->getGUID() . "&type={$type}",
																'text' => elgg_echo('delete'),
																'confirm' => elgg_echo('deleteconfirm'),
															)); ?>
		    </p>
		</div><!-- end of the message_options div -->
		
		</div><!-- end of div message_body -->
		
    </div><!-- end of the message div -->
	
<?php
    }
?>