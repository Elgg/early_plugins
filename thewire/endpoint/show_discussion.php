<?php

    /**
	 * Elgg show the wire discussion
	 *
	 * @package ElggThewire
	 * @license Private
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009 - 2009
	 * @link http://elgg.com/
	 */

    // Load Elgg engine will not include plugins
     require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
    
    global $CONFIG;
    
    //grab the actual wire post
    $wirepost = get_input('wirepost');
    //we don't want the latest reply as that is already displayed so set the offset value to 1
    $get_discussion = get_annotations($wirepost, "object", "thewire", "wire_reply", "", 0, 99, 1, "desc");
    
?>

<?php
	if($get_discussion){
		
		foreach($get_discussion as $disc){
			
			//check the reply has a value, if not, don't display it. We know the first annotation created
			//when the parent is created has no value so we don't want to display it here
			if($disc->value != ''){
				
				$comment_name = get_user($disc->owner_guid)->name;
?>
					<div class="thewire-post reply"><!-- open thewire-post div -->
						<div class="note_body">
							    <div class="thewire_icon"><!-- open thewire-icon div -->
								    <?php
									        echo elgg_view("profile/icon",array('entity' => get_user($disc->owner_guid), 'size' => 'tiny'));
								    ?>
								</div><!-- close thewire-icon div -->	
								
				<div class="thewire_options"><!-- open thewire_options div -->
				
				<div class="thewire_hidden_options">

		    		<?php		   
						// if the user looking at thewire post can edit, show the delete link
						if ($disc->owner_guid == $_SESSION['user']->guid || isadminloggedin()) {
							   echo "<div class='delete_note'>" . elgg_view("output/confirmlink",array(
								'href' => $CONFIG->wwwroot . "action/thewire/delete_reply?id=" . $disc->id,
								'text' => elgg_echo('delete'),
								'confirm' => elgg_echo('deleteconfirm'),
							)) . "</div>";
						} //end of can edit if statement

							//include a view for to-dos or other plugins
							//echo elgg_view('thewire/options', array('entity' => $disc));
						?>
						</div><!-- /thewire_hidden_options -->
					</div><!-- /thewire_options -->		
					
					
												
								<?php
										$url_one = $vars['url'] . $comment_name;
										echo "<div class='wire-post-message'><p><span class='wireownername'><a href=\"{$url_one}\">{$comment_name}</a></span> ";
									  	$desc = $disc->value;
									    $desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/thewire/$1">$1</a>',$desc);
									    echo parse_urls($desc);
									    echo "</p></div>";
								?>
							
								<div class="note_date"><!-- open note_date div -->
									<?php
										echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
															friendly_time($disc->time_created)
										);
										echo " " . elgg_echo('thewire:viasite');	
									?>
								</div><!-- close note_date div -->	
								</div><!-- close note_body div -->	
							</div><!-- close thewire-post div -->
	<?php
			 }//end of if statement to hide value = ''
			}//end foreach
		}//end check discussion
	?>
