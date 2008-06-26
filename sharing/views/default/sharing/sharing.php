<?php

	$owner = $vars['owner'];
	if ($friends = get_entities_from_relationship('friend',$owner->getGUID(),false,'user','')) {
		
		foreach($friends as $friend) {
			
			$label = elgg_view("profile/icon",array('entity' => $friend, 'size' => 'tiny'));
			$label .= "{$friend->name}"; 
			$options[$label] = $friend->getGUID();
			
		}
		
		echo elgg_view('input/checkboxes',array(
		
			'internalname' => 'shares',
			'options' => $options,
			'value' => $vars['shares'],
		
		));
		
	}

?>