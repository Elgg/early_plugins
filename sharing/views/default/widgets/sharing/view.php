<p>
	<?php

	    //get the num of shares the user want to display
		$num = $vars['entity']->num_display;
		
		//if no number has been set, default to 1
		if(!$num)
			$num = 1;
			
		set_context('search'); //display the results in search format
		
		//get the users inbox shares
		$shares = list_entities_from_relationship('share',page_owner(),true,'object','sharing', 0, $num, false);
		
        //print them out
		echo $shares;
	
	
	?>
</p>