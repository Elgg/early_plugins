<?php

	/**
	 * Elgg status CSS extender
	 * 
	 * @package ElggStatus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>

/* status clear and cancel buttons */
#status_clear #status_clear_button,
#status_update_form #status_cancel_button {

	font: 11px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
	background:#dddddd;
	border: 1px solid #999999;
	-webkit-border-radius: 3px; 
	-moz-border-radius: 3px;
	width: auto;
	padding:1px 3px 1px 3px;
	margin:5px 0 5px 0;
	cursor: pointer;

}

#status_clear #status_clear_button:hover,
#status_update_form #status_cancel_button:hover {
	color: #ffffff;
	background:#0054a7;
}

/* status save button */
#status_update_form #status_save_button {
	font: 11px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#4690d6;
	border: 1px solid #4690d6;
	-webkit-border-radius: 3px; 
	-moz-border-radius: 3px;
	width: auto;
	padding: 1px 3px 1px 3px;
	margin:5px 10px 5px 0;
	cursor: pointer;
}

#status_update_form #status_save_button:hover {
	background: #0054a7;
}



/* status messages history */

/* wraps each status msg */
.status_message {
	border-bottom: 1px solid #aaaaaa;
}
/* actual status message */
.status_statusmessage p {
	margin:0;
}
/* status message timestamp */
.widget_status_messagetimestamp {
	margin:0;
}








