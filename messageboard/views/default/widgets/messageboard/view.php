<?php

     /**
	 * Elgg messageboard plugin view page
	 *
	 * @todo let users choose how many messages they want displayed
	 *
	 * @package ElggMessageBoard
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
	 // a couple of required variables
	 
	 //get the full page owner entity
     $entity = get_entity(page_owner());
     
     //the number of message to display
     $num_display = $vars['entity']->num_display;
	 
?>
<script type="text/JavaScript">
$(document).ready(function(){
     
    $("#postit").click(function(){
        
        //display the ajax loading gif at the start of the function call
        $('#loader').html('<img src="<?php echo $vars['url']; ?>mod/messageboard/graphics/ajax-loader.gif" />');
        
        //load the results back into the message board contents and remove the loading gif
        //remember that the actual div being populated is determined on views/default/messageboard/messageboard.php
        $("#messageboard_wrapper").load("<?php echo $vars['url']; ?>mod/messageboard/ajax_endpoint/load.php", {messageboard_content:$("[name=message_content]").val(), pageOwner:$("[name=pageOwner]").val(), numToDisplay:<?php echo $num_display; ?>}, function(){
                    $('#loader').empty(); // remove the loading gif
                    $('[name=message_content]').val(''); // clear the input textarea
                }); //end of the function within load 
        }); // end of the main function to popular the message board
        
    }); //end of the .click function
</script>

<div id="mb_input_wrapper"><!-- start of mb_input_wrapper div -->

    <!-- message textarea -->
    <textarea name="message_content" id="testing" value="" class="input_textarea" /></textarea>
   
    <!-- the person posting an item on the message board -->
    <input type="hidden" name="guid" value="<?php echo $_SESSION['guid']; ?>" class="guid"  />
   
    <!-- the page owner, this will be the profile owner -->
    <input type="hidden" name="pageOwner" value="<?php echo page_owner(); ?>" class="pageOwner"  />
   
    <!-- submit button -->
    <input type="submit" id="postit" value="Post it">
    
    <!-- menu options -->
    <div id="messageboard_widget_menu">
        <a href="<?php echo $vars['url']; ?>pg/messageboard/<?php echo get_user(page_owner())->username; ?>">view all</a> | <a href="">share a link</a> | <a href="">attach media</a>
    </div>
    
    <!-- loading graphic -->
    <div id="loader" class="loading">  </div>

</div><!-- end of mb_input_wrapper div -->

<p>
	<?php
    
        //this for the first time the page loads, grab the latest 5 messages.
		$contents = $entity->getAnnotations('messageboard', $num_display, 0, 'desc');
		
		//as long as there is some content to display, display it
		if (!empty($contents)) {
    		
    		echo elgg_view('messageboard/messageboard',array('annotation' => $contents));
		
		} 
	
	?>
</p>