<?php
	/**
	 * Elgg file browser
	 * 
	 * @package ElggFile
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	/**
	 * Override the ElggFile so that 
	 */
	class FilePluginFile extends ElggFile
	{
		protected function initialise_attributes()
		{
			parent::initialise_attributes();
			
			$this->attributes['subtype'] = "file:file";
		}
		
		public function __construct($guid = null) 
		{			
			parent::__construct($guid);
		}
	}
	

	/**
	 * File plugin initialisation functions.
	 */
	function file_init() 
	{
		// Get config
		global $CONFIG;
				
		// Set up menu for logged in users
		if (isloggedin()) 
		{
			add_menu(elgg_echo('file'), $CONFIG->wwwroot . "pg/file/" . $_SESSION['user']->username, array(
				menu_item(sprintf(elgg_echo("file:yours"),$_SESSION['user']->name), $CONFIG->wwwroot . "pg/file/" . $_SESSION['user']->username),
				menu_item(sprintf(elgg_echo('file:friends'),$_SESSION['user']->name), $CONFIG->wwwroot . "pg/file/". $_SESSION['user']->username . "/friends/"),
				menu_item(elgg_echo('file:all'), $CONFIG->wwwroot . "pg/file/". $_SESSION['user']->username . "/world/"),
				menu_item(elgg_echo('file:upload'), $CONFIG->wwwroot . "pg/file/". $_SESSION['user']->username . "/new/")
			));
		}
		else
		{
			add_menu(elgg_echo('file'), $CONFIG->wwwroot . "pg/file/" . $_SESSION['user']->username . "/", array(
				menu_item(elgg_echo('file:all'), $CONFIG->wwwroot . "pg/file/". $_SESSION['user']->username . "/world/"),
			));
		}
		
		// Extend CSS
		extend_view('css', 'file/css');
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('file','file_page_handler');
			
		// Now run this stuff, but only once
		run_function_once("file_run_once");
	}

	/**
	 * File page handler
	 *
	 * @param array $page Array of page elements, forwarded by the page handling mechanism
	 */
	function file_page_handler($page) {
		
		global $CONFIG;
		
		// The username should be the file we're getting
		if (isset($page[0])) {
			set_input('username',$page[0]);
		}
		
		if (isset($page[1])) 
		{
    		switch($page[1]) 
    		{
    			case "friends":  
    				include($CONFIG->pluginspath . "file/friends.php");
          		break;
   				case "world":  
   					include($CONFIG->pluginspath . "file/world.php");
          		break;
    			case "new":  
    				include($CONFIG->pluginspath . "file/upload.php");
          		break;
    		}
		}
		else
		{
			// Include the standard profile index
			include($CONFIG->pluginspath . "file/index.php");
		}
		
	}
	
	/**
	 * Draw an individual file.
	 *
	 * @param ElggFile $file
	 */
	function file_draw_file(ElggFile $file)
	{
		// Get tags
		$tags = $file->getMetaData("tag");
		if (!is_array($tags))
			$tags = array($tags);
	
		// Draw file 
		return elgg_view("file/file", array(
			"file_guid" => $file->guid,
			"tags" => $tags,
			"title" => $file->title,
			"description" => $file->description,
			"mimetype" => $file->getMimeType()
		));
	}
	
	/**
	 * Draw a given set of objects.
	 *
	 * @param array $objects
	 */
	function file_draw(array $objects)
	{
		$body = "";
		
		foreach ($objects as $object)
			$body .= file_draw_file($object);
			
		return $body;
	}
	
	function file_draw_footer($limit, $offset)
	{
		return elgg_view("file/footer", array(
			"limit" => $limit,
			"offset" => $offset
		));
	}
	
	
	/**
	 * Run once and only once.
	 */
	function file_run_once()
	{
		// Register a class
		add_subtype("object", "file:file", "FilePluginFile");	
	}
	
	
	// Make sure test_init is called on initialisation
	register_elgg_event_handler('init','system','file_init');
	
	// Register actions
	register_action("file/upload", false, $CONFIG->pluginspath . "file/actions/upload.php");
	register_action("file/download", false, $CONFIG->pluginspath. "file/actions/download.php");
	
?>