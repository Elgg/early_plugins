<?php

	/**
	 * Elgg status friends view. This is used when you look at your friends list.
	 * 
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 *
	 * @uses $vars['entity'] Optionally, the status message to view
	 */
	 
		if (isset($vars['entity'])) {
    		
    		
?>

	<div class="">
	
	    <!-- display the message -->
        <p>
    			<?php
    				echo parse_urls(elgg_view("output/longtext",array("value" => $vars['entity']->description)));
    			?>
        </p>
    		
    </div><!-- end widget_status_statusmessage -->
				
    <div class="">
		<p>
		<?php
		
		    //display the time posted
		    echo elgg_echo("status:set") . " " . sprintf(elgg_echo("status:strapline"),
								friendly_time($vars['entity']->time_created));
			
		?>
		</p>
	</div><!-- close  div -->
	
		
<?php

		}

?>