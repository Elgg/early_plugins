<?php
 
    /**
	 * Elgg Twitter CSS
	 * 
	 * @package ElggTwitter
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
     
?>

#twitter_widget {
    
}

#twitter_widget ul {
	margin:0;
	padding:0;
}

#twitter_widget li {
	background:#EBF5FF url(<?php echo $vars['url']; ?>mod/twitter/graphics/twitter_arrow.gif) no-repeat right bottom;
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin:0pt;
	padding:8px 10px 30px;
	overflow-x: hidden;
}

#twitter_widget li span {
	color:#666666;
}

p.visit_twitter {
    background:url(<?php echo $vars['url']; ?>mod/twitter/graphics/twitter.png) left no-repeat;
    padding:0 0 0 20px;
    margin:0;
}

#twitter_widget li a {
	display:block;
}

#twitter_widget li span a {
	display:inline !important;
}