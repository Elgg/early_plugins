#facebox {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 100;
	text-align: left;
}

#facebox .popup {
	position: relative;
}

#facebox .body {
	padding: 10px;
	background: #ffffff;
	width: 730px;
  
	-webkit-border-radius: 12px; 
	-moz-border-radius: 12px;
	border:1px solid #ffffff;
}

#facebox .loading {
	text-align: center;
	padding: 100px 10px 100px 10px;
}

#facebox .image {
	text-align: center;
}
#facebox .footer {
	float: right;
	width:22px;
	height:22px;
	margin:0;
	padding:0;
}
#facebox .footer img.close_image {
	background: url(<?php echo $vars['url']; ?>mod/embed/images/close_button.gif) no-repeat left top;
}
#facebox .footer img.close_image:hover {
	background: url(<?php echo $vars['url']; ?>mod/embed/images/close_button.gif) no-repeat left -31px;
}
#facebox .footer a {
	-moz-outline: none;
	outline: none;
}

#facebox_overlay {
	position: fixed;
	top: 0px;
	left: 0px;
	height:100%;
	width:100%;
}

.facebox_hide {
	z-index:-100;
}

.facebox_overlayBG {
	background-color: #000000;
	z-index: 99;
}

* html #facebox_overlay { /* ie6 hack */
	position: absolute;
	height: expression(document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + 'px');
}


/* EMBED MEDIA TABS */

#embed_media_tabs {
	margin:10px 0 20px 10px;
	padding:0;
}
#embed_media_tabs ul {
	list-style: none;
	padding-left: 0;
}
#embed_media_tabs ul li {
	float: left;
	margin:0;
	background:white;
}
#embed_media_tabs ul li a {
	font-weight: bold;
	font-size:1.35em;
	text-align: center;
	text-decoration: none;
	color:#999999;
	background: #efefef;
	display: block;
	padding: 0 10px 0 10px;
	margin:0 10px 0 10px;
	height:25px;
	width:auto;
	border-top:2px solid #efefef;
	border-left:2px solid #efefef;
	border-right:2px solid #efefef;
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	-webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px;
}
#embed_media_tabs ul li a.embed_tab_selected {
	border-top:2px solid #cccccc;
	border-left:2px solid #cccccc;
	border-right:2px solid #cccccc;
	-webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px;
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	background: white;
	color:#4690d6;
	position: relative;
	top: 2px;
}

#mediaUpload,
#mediaEmbed {
	margin:0 10px 10px 10px;
	padding:15px;
	border:2px solid #ccc;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
}

h1.mediaModalTitle {
	border-bottom:1px solid #666666;
	font-size:1.6em;
	padding-bottom:3px;
}

#mediaEmbed .pagination,
#mediaUpload .pagination {
	float:right;
	margin:0;
}
#mediaUpload label {
	font-size:120%;
}
#mediaEmbed p.embedInstructions {
	margin:10px 0 0 0;
}
a.embed_media {
	margin:0;
	float:right;
	display:block;
	text-align: right;
	font-size:0.8em;
	font-weight: normal;
}















