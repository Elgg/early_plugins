<?php

    /**
	 * Elgg send a message page
	 *
	 * @todo still need to accomodate sending a message to someone who is not a user's friend
	 * this will be simple, grab the user guid from their profile, that will replace the 
	 * select box below
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @uses $vars['friends'] This is an array of a user's friends and is used to populate the list of
	 * people the user can message
	 *
	 */
	 
?>

	<form action="<?php echo $vars['url']; ?>action/messages/send" method="post" name="messageForm">
		<p>
			<?php echo elgg_echo("messages:text"); ?><br />
			<label><?php echo elgg_echo("messages:to"); ?>: <br />								
			<select name='send_to'>
			<?php 
			    
			    foreach($vars['friends'] as $friend){
    			   
    			    //populate the send to box with a user's friends
			        echo "<option value='{$friend->guid}'>" . $friend->username . "</option>";
			        
		        }
		    ?>
		    </select><br />
			<label><?php echo elgg_echo("messages:title"); ?>: <br /><input type='text' name='title' value='' /></label><br />
			<label><?php echo elgg_echo("messages:message"); ?>: <br /><textarea name='message' value='' /></textarea></label>
		</p>
		<p>
			<input type="submit" value="<?php echo elgg_echo("messages:fly"); ?>!" />
		</p>
	
	</form>