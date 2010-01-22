<?php

	/**
	 * Elgg thewire inline reply
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	 
	 // Load Elgg engine will not include plugins
     require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	 
?>




<script type="text/javascript">
$(document).ready(function(){

	$(".inline_reply_wrapper").fadeIn(350);	
	$("#replybox").focus();
	  
	$('.cancel_button').click(function () {
		$(".inline_reply_wrapper").slideUp(250, function () {
			$(".inline_reply_wrapper").empty();
		});
	});

});

</script>

<div class="inline_reply_wrapper" style="display:none;">
<div class="thewire-post replyform"><!-- open thewire-post reply div -->
	<div class="note_body"><!-- open note_body div -->
	<div class="thewire_icon"><!-- open thewire_icon div -->
    	<?php
	        echo elgg_view("profile/icon",array('entity' => get_user($_SESSION['user']->guid), 'size' => 'tiny'));
    	?>
    </div><!-- close thewire_icon div -->
	
<div style="float:left;width:640px;">	
<!-- display the reply form -->

	<form action="<?php echo $CONFIG->wwwroot; ?>action/thewire/reply" method="post" name="inlineReplyForm">

	<?php   
		echo "<div class='wire-post-message'><p style='margin-left:0;'><span class='wireownername'>Reply to conversation: </span></p></div> ";             
		echo "<textarea name='note' style='width:625px;height:40px;' value='' onKeyDown=\"textCounter(document.inlineReplyForm.note,document.inlineReplyForm.inlineReplyFormremLen1,140)\" onKeyUp=\"textCounter(document.inlineReplyForm.note,document.inlineReplyForm.inlineReplyFormremLen1,140)\" id='replybox' ></textarea>";

		echo "<input type=\"submit\" class=\"wire_post_button\" value=\"";
		echo elgg_echo("thewire:post") . "\" />";
		echo "<input type=\"button\" class=\"cancel_button\" value=\"Cancel\" />";
			
		echo "<div class='note_date' style='margin-left:-16px;'><div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"inlineReplyFormremLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
		echo "characters. Just now via site</div><div class='clearfloat'></div></div>";	
		echo elgg_view('input/securitytoken');
	?>
		<input type='hidden' name='parent' value='<?php echo get_input('wirepost'); ?>' />
		<input type="hidden" name="method" value="site" />
		<input type="hidden" name="access" value="<?php echo $access_id; ?>" />
	</form>

</div>	<div class='clearfloat'></div>

	</div><!-- close note_body div -->
	</div><!-- /thewire-post reply -->
</div>	
