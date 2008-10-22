<?php

	/**
	 * Elgg file browser
	 * 
	 * @package ElggFile
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
	
	$simpletype = get_input('simpletype');
	$offset = (int) get_input('offset',0);
	
	if ($simpletype != 'all') {
		
		$entities = get_entities_from_metadata('simpletype',$simpletype,'object','file',page_owner(),10);
		
	} else {
		
		$entities = get_entities('object','file',page_owner(),'',10,$offset);
		
	}
	
	set_context('search');
	//set_input('search_viewtype','gallery');

	$body = '';
	foreach($entities as $entity) {
		$body .= elgg_view('embed/file',array('entity' => $entity));
	}
	
	echo $body;

?>