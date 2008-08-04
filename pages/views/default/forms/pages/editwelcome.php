<?php
	/**
	 * Elgg Pages Edit welcome page
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */
	 
	 //set some variables
	 if($vars['entity']){
    	 foreach($vars['entity'] as $welcome){
    	    $current_message = $welcome->description;
	    }
	 }else{
    	 $current_message = '';
	 }
	 
	 $page_owner = $vars['owner']->guid;
	 
?>
<form action="<?php echo $vars['url']; ?>action/pages/editwelcome" method="post">

    <p>
		<label>
			<?php echo elgg_view("input/longtext",array(
															'internalname' => "pages_welcome",
															'value' => $current_message,
															'disabled' => $disabled
															)); ?>
		</label>
	</p>
	<input type="hidden" name="owner_guid" value="<?php echo $page_owner; ?>" />
	<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
</form>
