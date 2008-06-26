<p>
	<?php
		if (!$number = $vars['entity']->numdisplay) {
			$number = 1;
		}
	?>
	<?php echo elgg_echo("file:display:number"); ?>
	<?php

		echo elgg_view('input/text',array(
												'internalname' => "params[numdisplay]",
												'value' => $number
										));
	
	?>
</p>