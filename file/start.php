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
			
			$this->attributes['subtype'] = "file";
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
			
		// Add a new file widget
		add_widget_type('filerepo',elgg_echo("file:widget"),elgg_echo("file:widget:description"));
		
		// Register a URL handler for files
		register_entity_url_handler('file_url','object','file');

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
    			case "read":
    				set_input('guid',$page[2]);
					@include(dirname(dirname(dirname(__FILE__))) . "/entities/index.php");
				break;
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
	 * Returns an overall file type from the mimetype
	 *
	 * @param string $mimetype The MIME type
	 * @return string The overall type
	 */
	function get_general_file_type($mimetype) {
		
		switch($mimetype) {
			
			case "application/msword":
										return "document";
										break;
			case "application/pdf":
										return "document";
										break;
			
		}
		
		if (substr_count($mimetype,'text/'))
			return "document";
			
		if (substr_count($mimetype,'audio/'))
			return "audio";
			
		if (substr_count($mimetype,'image/'))
			return "image";
			
		if (substr_count($mimetype,'video/'))
			return "video";

		if (substr_count($mimetype,'opendocument'))
			return "document";	
			
		return "general";
		
	}
	
	function get_filetype_cloud($owner_guid = "") {
		
		return elgg_view('file/typecloud',array('owner_guid' => $owner_guid, 'types' => get_tags(0,10,'simpletype','object','file',$owner_guid)));

	}
	
	/**
	 * Populates the ->getUrl() method for blog objects
	 *
	 * @param ElggEntity $blogpost Blog post entity
	 * @return string Blog post URL
	 */
		function file_url($entity) {
			
			global $CONFIG;
			$title = $entity->title;
			$title = friendly_title($title);
			return $CONFIG->url . "pg/file/" . $entity->getOwnerEntity()->username . "/read/" . $entity->getGUID() . "/" . $title;
			
		}
	
	// Make sure test_init is called on initialisation
	register_elgg_event_handler('init','system','file_init');
	
	// Register actions
	register_action("file/upload", false, $CONFIG->pluginspath . "file/actions/upload.php");
	register_action("file/save", false, $CONFIG->pluginspath . "file/actions/save.php");
	register_action("file/download", true, $CONFIG->pluginspath. "file/actions/download.php");
	register_action("file/icon", true, $CONFIG->pluginspath. "file/actions/icon.php");
	register_action("file/delete", false, $CONFIG->pluginspath. "file/actions/delete.php");
	
?>