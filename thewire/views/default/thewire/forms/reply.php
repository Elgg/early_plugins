<?php

	/**
	 * Elgg thewire edit/add page
	 * 
	 * @package ElggTheWire
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * 
	 */
	 
	 if(isset($vars['entity'])){
    	 
    	 //username of the original note
    	 $user_name = $vars['entity']->getOwnerEntity()->username;
    	 
?>

<script>
function textCounter(field,cntfield,maxlimit) {
    // if too long...trim it!
    if (field.value.length > maxlimit) {
        field.value = field.value.substring(0, maxlimit);
    } else {
        // otherwise, update 'characters left' counter
        cntfield.value = maxlimit - field.value.length;
    }
}
</script>
<div class="thewire-singlepage">
    <!-- the original note that the reply is intended for -->
    <div class="thewire-post">
		
	    <div class="thewire_icon">
	    <?php
		        echo elgg_view("profile/icon",array('entity' => $vars['entity']->getOwnerEntity(), 'size' => 'small'));
	    ?>
	    </div>
		
		<p class="note_body">
		
		<?php
			echo "<b>{$user_name}: </b>" . parse_urls($vars['entity']->description);
		?>
		
		
		<?php

		    //if the shout owner is looking at it, display the delete link
			if ($vars['entity']->canEdit()) {
				
			?>
				<div class="delete_note">
				<?php
				
					echo elgg_view("output/confirmlink", array(
																'href' => $vars['url'] . "action/thewire/delete?thewirepost=" . $vars['entity']->getGUID(),
																'text' => elgg_echo('delete'),
																'confirm' => elgg_echo('deleteconfirm'),
															));

				?>
				</div>
			<?php
			}
		
		?>
		<div class="note_date">
		<?php
			
				echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
								friendly_time($vars['entity']->time_created)
				);
				
				echo " " . elgg_echo("thewire:via") . " " . $vars['entity']->method . ".";
			
		?>
		</div></p>
		
		
	</div>

	<!-- the reply form -->
	<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
			<label><?php echo elgg_echo("thewire:reply"); ?><br />
			<?php
			    $display .= "<textarea name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_large-textarea\"></textarea><br />";
                $display .= "<div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
                echo $display;
                echo elgg_echo("thewire:charleft") . "</div>";
			?>
			</label>
		<p>
		    <input type="hidden" name="parent" value="<?php echo $vars['entity']->guid; ?>" />
		    <input type="hidden" name="access" value="<?php echo $vars['entity']->access_id; ?>" />
			<input type="hidden" name="method" value="site" />
			<input type="submit" value="<?php echo elgg_echo('save'); ?>" id="thewire_submit_button" />
		</p>
	
	</form>
	<br />
<?php
    }
    
    //get any replies and display
    if(!empty($vars['replies'])){
        
        foreach($vars['replies'] as $reply){
            
            $reply_user = $reply->getOwnerEntity()->username;
?>

     <div class="thewire-post">
		
	    <div class="thewire_icon">
	    <?php
		        echo elgg_view("profile/icon",array('entity' => $reply->getOwnerEntity(), 'size' => 'small'));
	    ?>
	    </div>
	    
		<p class="note_body">
		
		<?php
			echo "<b>{$reply_user}: </b>" . parse_urls($reply->description);
		?>
		
		
		
		<?php
            //if the shout owner is looking at it, display the delete link
			if ($reply->canEdit()) {
				
			?>
				<div class="delete_note">
				<?php
				
					echo elgg_view("output/confirmlink", array(
																'href' => $vars['url'] . "action/thewire/delete?thewirepost=" . $reply->getGUID(),
																'text' => elgg_echo('delete'),
																'confirm' => elgg_echo('deleteconfirm'),
															));

				?>
				</div>
			<?php
			}
		
		?>
		<div class="note_date">
		<?php
			
				echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
								friendly_time($reply->time_created)
				);
				
				echo " via " . $reply->method . ".";
			
		?>
		</div></p>
		
		
	</div>
    
<?php
        }
    }
?>
</div>