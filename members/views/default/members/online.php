<?php

	/**
	 * Show members online
	 **/
	 
	 echo "<div class=\"members_online\">";
	 echo "<h3>" . elgg_echo('members:online') . "</h3>";
	 echo get_online_users();
	 echo "</div>";
	 
?>