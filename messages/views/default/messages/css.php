<?php

	/**
	 * Elgg Messages CSS extender
	 * 
	 * @package ElggMessages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

?>

#messages .message_notread td {
    background:#efefef;
}

.previous_message {
    background:#efefef;
    border:1px solid #ccc;
    padding:4px;
}

/*-------------------------------
MESSAGING PLUGIN
-------------------------------*/
#sendmessage {
	margin:10px;
}
.actiontitle {
	font-weight: bold;
	font-size: 110%;
	margin: 0 0 10px 0;
}
#sendmessage select {
	width: 120px;
	height: 26px;
	/*padding: 4px;*/
	padding: 0px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	font-size: 140%;
	color:#666666;
	border:1px solid #cccccc;
	margin:0 0 10px 0;
}

#sendmessage #large-textarea {
	width: 608px;
	height: 120px;
	padding: 6px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	font-size: 140%;
	color:#666666;
	border:1px dotted #555555;
	margin:0 0 10px 0;
}

#sendmessage input.submit_message { 
	background-color: #3399cc;/* blue */
	color:#ffffff;
	font-size: 14px;
	font-weight: bold;
	text-decoration:none;
	margin:0 0 0px 0;
	padding:3px 6px 6px 6px;
	border:none;
	cursor:pointer;
	width:auto;
	border:2px solid white;
}
#sendmessage input.submit_message:hover { 
	background-color: #000000;
}
#sendmessage input.general-textarea {
	width: 408px;
	height: 20px;
	padding: 4px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	font-size: 140%;
	color:#666666;
	border:1px solid #cccccc;
	margin:0 0 10px 0;
}

#messages {
	margin: 0 0 0 0;
	/* border-bottom: 1px solid #d6dbd2; */
	padding: 0;
	/* width:550px; */
}

#messages td {
	border: none;
	padding: 5px 10px 5px 0;
	margin: 0;
	border-bottom: 1px solid #d6dbd2;
}

#messages p {
	margin: 0 0 10px 0;
	padding: 0;
}

#messages img {
	float: left;
	margin: 0 15px 0 5px;
}

#messages .msgsender {
	color:#666666;
	line-height: 15px;
	margin:7px 0 0 0;
}

#messages .msgsubject {
	font-size: 120%;
	line-height: 100%;
}

#messages .message_notread td {
	 background: #cccccc; 
}

.msgsubject {
	font-weight:bold;
}

/* reply view */
.messages_single {
	margin: 10px 10px 10px 10px;
	padding: 10px;
	background-color: #ffffff;
}

.messages_single_icon {
	float: left;
	margin: 0 10px 10px 0;
}

.message_body {
	margin-left: 120px;
}
.message_body .messagebody {
	padding:10px 0 20px 0;
	margin:10px 0 10px 0;
	font-size: 120%;
	border-bottom:1px solid #cccccc;
}
.messages_single .message_reply { 
	background-color: #3399cc;/* blue */
	color:#ffffff;
	font-size: 14px;
	font-weight: bold;
	text-decoration:none;
	margin:0;
	padding:3px 6px 6px 6px;
	cursor:pointer;
	width:50px;
	border:2px solid white;
}

.messages_single .message_reply a {
    color:#fff;
}

.messages_single .message_reply:hover { 
	background-color: #000000;
}