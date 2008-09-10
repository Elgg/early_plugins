<?php

     /**
	 * Elgg Plugin language pack
	 * 
	 * @package Elgg Blog
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * ****************************************
     * @Italian Language Pack
     * @Plugin: Blog
     * @version: beta 00000
     * @translation by Lord55  
     * @link http://www.nobilityofequals.com
     ****************************************/

	$italian = array(
	
		/**
		 * Menu items and titles   ###Argomenti menu e titoli###
		 */
	
			'blog' => "Blog",
			'blogs' => "Blogs",
			'blog:user' => "Blog di %s",
			'blog:user:friends' => "Blog degli amici di %s",
			'blog:your' => "Tuo blog",
			'blog:posttitle' => "Blog di %s: %s",
			'blog:friends' => "Blog degli amici",
			'blog:yourfriends' => "Ultimi blog dei tuoi amici",
			'blog:everyone' => "Blog di tutto il sito",
	
			'blog:read' => "Leggi blog",
	
			'blog:addpost' => "Scrivi articolo",
			'blog:editpost' => "Modifica articolo",
	
			'blog:text' => "Testo dell'articolo",
	
			'blog:strapline' => "%s",
			
			'item:object:blog' => 'Articoli',
	
			
         /**
	     * Blog river   ###Blog river###
	     **/
	        
	        //generic terms to use
	        'blog:river:created' => "%s scritto",
	        'blog:river:updated' => "%s aggiornato",
	        'blog:river:posted' => "%s inviato",
	        
	        //these get inserted into the river links to take the user to the entity
	        'blog:river:create' => "un nuovo articolo.",
	        'blog:river:update' => "un articolo.",
	        'blog:river:annotate:create' => "un commento sull'articolo.",
			
	
		/**
		 * Status messages   ###Messaggi di stato###
		 */
	
			'blog:posted' => "L'articolo è stato inviato con successo.",
			'blog:deleted' => "L'articolo è stato cancellato con successo.",
	
		/**
		 * Error messages   ###Messaggi di errore###
		 */
	
			'blog:save:failure' => "L'articolo non può essere salvato. Per favore riprova.",
			'blog:blank' => "Scusaci; devi riempire il titolo e il corpo del articolo prima di poterlo inviare",
			'blog:notfound' => "Scusaci; non possiamo trovare l'articolo specificato.",
			'blog:notdeleted' => "Scusaci; non possiamo cancellare questo articolo.",
	
	);
					
	add_translation("it",$italian);

?>