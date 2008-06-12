<?php

    /**
	 * Elgg reply to a message form
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @uses $vars['entity'] This is the message being replied to
	 *
	 */
	 
?>

	<form action="<?php echo $vars['url']; ?>action/messages/send" method="post" name="messageForm">
		<p>
			
    		<?php echo elgg_echo("messages:text"); ?><br />	
    		<!-- populate the title space with the orginal message title, inserting re: before it -->						        
			<label><?php echo elgg_echo("messages:title"); ?>: <br /><input type='text' name='title' value='RE:<?php echo $vars['entity']->title; ?>' /></label><br />
			<label><?php echo elgg_echo("messages:message"); ?>: <br /><textarea name='message' value='' /></textarea></label>
		</p>
		<p>
	        <?php
                
	            //pass across the guid of the message being replied to
    	        echo "<input type='hidden' name='reply' value='" . $vars['entity']->getGUID() . "' />";
    	        //pass along the owner of the message being replied to
    	        echo "<input type='hidden' name='send_to' value='" . $vars['entity']->owner_guid . "' />";
	
	        ?>
	        <input type="submit" value="<?php echo elgg_echo("messages:fly"); ?>!" />
		</p>
	
	</form>
	
	<?php
        //display the message you are replying to
		if (isset($vars['entity'])) {
    		
    		echo "<h3>" . elgg_echo("messages:replying") . "</h3>";
    		echo $vars['entity']->description;
    		
		}
    ?>