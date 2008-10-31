<?php

	/**
	 * Elgg thewire note view
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @question - do we want users to be able to edit thewire?
	 * 
	 * @uses $vars['entity'] Optionally, the note to view
	 */

	if (isset($vars['entity'])) {
    		
    		$user_name = $vars['entity']->getOwnerEntity()->username;
    		
    		//if the note is a reply, we need some more info
    		if($vars['entity']->parent != 0){
        		
        		$at_reply = get_entity($vars['entity']->parent)->getOwnerEntity(); //the original note owner
        		$note_owner = $at_reply->username; //the owner's username
        		$note_url = $vars['url'] . "mod/thewire/reply.php?note_id=" . $vars['entity']->parent;//link to the original note
        		
    		}
    		
    		
?>
<div class="thewire-singlepage">
	<div class="thewire-post">
		
	    <div class="thewire_icon">
	    <?php
		        echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'small'));
	    ?>
	    </div>
	    
	    <!-- the actual shout -->
		<p class="note_body">

		<?php
		    //only have a reply option for main notes, not other replies
		    if($vars['entity']->parent == 0){
        ?>
		<a href="<?php echo $vars['url']; ?>mod/thewire/reply.php?note_id=<?php echo $vars['entity']->guid; ?>" class="reply">reply</a>
		<?php
	        }
	    ?>
		
		<?php
		    echo "<b>{$user_name}: </b>";
		    
		    //check to see if it is a reply
		    if($vars['entity']->parent != 0){
    		    echo " @<a href=\"{$note_url}\">{$note_owner}</a> ";
		    }
    		    
			echo parse_urls($vars['entity']->description);
		?>

		

		<?php
				   
			// if the user looking at thewire post can edit, show the delete link
			if ($vars['entity']->canEdit()) {
						
	  
					   echo "<div class='delete_note'>" . elgg_view("output/confirmlink",array(
															'href' => $vars['url'] . "action/thewire/delete?thewirepost=" . $vars['entity']->getGUID(),
															'text' => elgg_echo('delete'),
															'confirm' => elgg_echo('deleteconfirm'),
														)) . "</div>";
			
			} //end of can edit if statement
		?>
		
		<div class="note_date">
		
		<?php
			
				echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
								friendly_time($vars['entity']->time_created)
				);
				
				echo " via " . $vars['entity']->method . ".";
			
		?>
		</div></p>
		
		
	</div>
</div>
<?php

		}

?>