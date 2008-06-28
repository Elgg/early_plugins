<?php

	/**
	 * Elgg status view when the user does not have a current status set.
	 * 
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @uses $vars['status_owner'], if the page is called by the ajax action. Otherwise, on full page load,
	 * the script uses page_owner().
	 */
	 
	 
?>
<script type="text/JavaScript">
$(document).ready(function(){
       
    //when the user click into the message area, show the required menu options and clear the text
    $("#status_message").focus(function(){
        
        //sort out the various fields 
        $('#status_update_form').show(); //show the submit and cancel buttons
        $("#status_message").val(''); //clear the input field, in prep for the user's new message
        
    });
    
    //if the user decides not to proceed with a new status message, hide the submit controls and 
    //replace the no status message.
    $("#status_cancel_button").click(function(){
        
        //sort out the various fields 
        $('#status_update_form').hide(); // hide the submit and cancel buttons
        $('#status_message').val('<?php echo elgg_echo('status:nostatus'); ?>'); // no status message
        
    });
    
    //when the user writes a new status message, grab the required information and submit it
    $("#status_save_button").click(function(){
        
        //display the ajax loading gif at the start of the function call
        $('#status_loading').html('<?php echo elgg_view('ajax/loader',array('slashes' => true)); ?>');
        
        //load the results back into the message board contents and remove the loading gif
        //remember that the actual div being populated is determined on views/default/messageboard/messageboard.php     
        $("#status_widget_container").load("<?php echo $vars['url']; ?>mod/status/ajax_endpoint/load.php", {status:$("#status_message").val()}, function(){
                    $('#status_loading').empty(); // remove the loading gif
                }); //end  
                
    }); // end of the main click function
  
});
</script>
<style type="text/css">
    
    #status_update_form {
        display:none;
    }
    
    .status_input_form {
        border:0;
        background:transparent;
    }
    
</style>

<div id="status_widget_container"><!-- start of status_widget_container -->

    <div class="widget_status_statusmessage"><!-- start of widget_status_statusmessage -->

        <?php
	    
	        //if the user is looking at their own status, display it in a input field to enable editing, otherwise, 
	        //just display as normal
	        if ($vars['entity']->canEdit()) {
    	        
    	?>
    	
    	    <p>
    			<input type="text" name="status_message" id="status_message" value="<?php echo elgg_echo('status:nostatus'); ?>" class="status_input_form" />
            </p>
    		
         <?php 
            } else {
         ?>

    		<p>
    			<?php
    				<?php echo elgg_echo('status:nostatus'); ?>
    			?>
    		</p>
    		
    	<?php 
	        }
	    ?>
    
    </div><!-- end of widget_status_statusmessage -->
    
	<?php
	
	        //get the page owner if it is the first load of the page, or the status owner, if the 
	        //state has been changed via ajax
	        
	        if(page_owner()){
    	        $owner = page_owner();
	        } else {
    	        $owner = $vars['status_owner'];
	        }

	        //if the shout owner is looking at it, display the various options
			if ($owner == $_SESSION['user']->getGUID()) {
		
	?>
			    
				<div id="status_update_form"><!-- start of status_update_form -->  
				    <input type="button" id="status_save_button" value="<?php echo elgg_echo('save'); ?>" />
				    <input type="button" id="status_cancel_button" value="<?php echo elgg_echo('cancel'); ?>" />
				</div><!-- end of status_update_form -->
				
				<div id="status_view_history"><!-- start of status view history -->  			
				    <a href="<?php echo $vars['url']; ?>pg/status/<?php echo get_user($vars['entity']->owner_guid)->username; ?>"><?php echo elgg_echo('status:viewhistory'); ?></a>	
				</div><!-- end of status view history -->  
				
	<?php
	
			} //end of status owner if statement
		
    ?>

<!-- loading graphic -->
<div id="status_loading" class="loading">  </div>   

</div><!-- end of status_widget_container -->