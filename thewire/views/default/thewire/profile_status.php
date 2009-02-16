<?php

	/**
	 * New wire post view for the activity stream
	 */
	 
	$page_owner = page_owner();

	//grab the users latest from the wire
	$latest_wire = get_entities("object", "thewire", $page_owner, 1, true, false, false);
	
	if($latest_wire){
		foreach($latest_wire as $lw){
			$content = $lw->description;
			$time = "<span>" . friendly_time($lw->time_created) . "</span>";
		}
	}

?>

<div class="profile_status">
		<?php
			if($latest_wire)
				echo $content . " " . $time;
		?>
</div>