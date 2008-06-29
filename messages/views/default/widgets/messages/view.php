<p>
	<?php
	
	    $num_messages = count_unread_messages();
	    
        if($num_messages  == 0)
		    echo "<h2>You have no new messages.</h2>";
		else {
		    echo "<h2>" . $num_messages . " new message(s).</h2>";
		    echo "<a href=\"" . $vars['url'] . "pg/messages/" . $_SESSION['user']->username ."\">check them out</a>";
	    }

	?>
</p>