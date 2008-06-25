<?php

	/**
	 * Elgg Messageboard CSS extender
	 * 
	 * @package ElggMessageBoard
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>
/* input msg area */
#mb_input_wrapper {
	border:1px dotted #cccccc;
	background:#f5f5f5;
	padding:4px;
}

#mb_input_wrapper .input_textarea {
	width:94%;
}
.message_item_timestamp {
	font-size:smaller;
	color:#666666;
	padding:10px 0 0 0;
}

/* wraps each message */
.messageboard {
	margin:5px 0 5px 0;
    /*border-top:1px solid #eee;
    border-bottom:1px solid #eee; */
    background:#f5f5f5;
}
/* sender icon */
.message_sender .icon {
	float:left;
	width:35px;
}
.message_sender img {
	padding: 5px 0 0 5px;
}
.messageboard .message {
	line-height: 1.2em;
	background:#fffcd9;
	margin:4px;
	padding:4px;
	border-bottom:1px dotted #cccccc;
}
.message_buttons {
	font-size: smaller;
	padding:0 0 3px 4px;
	line-height: 1.1em;
}
/* temporarily constrain delete button */
.message_buttons img {
	width:10px;height:10px;
	padding:0 0 0 0;
}








