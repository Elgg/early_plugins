<?php
     /**
	 * Elgg Plugin language pack
	 * 
	 * @package Elgg Pages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * ****************************************
     * @Italian Language Pack
     * @Plugin: Pages
     * @version: beta 00000
     * @translation by Lord55  
     * @link http://www.nobilityofequals.com
     ****************************************/
	
	$italian = array(
	
		/**
		 * Menu items and titles  ###Argomenti menu e titoli###
		 */
			
			'pages' => "Pagine",
			'pages:yours' => "Le tue pagine",
			'pages:user' => "Pagine home",
			'pages:group' => "Pagine di %s",
			'pages:all' => "Tutte le pagine del sito",
			'pages:new' => "Nuova pagina",
			'pages:groupprofile' => "Pagine del Gruppo",
			'pages:edit' => "Modifica questa pagina",
			'pages:delete' => "Cancella questa pagina",
			'pages:history' => "Archivio pagine",
			'pages:view' => "Vedi pagina",
			'pages:welcome' => "Modifica messaggio di benvenuto",
			'pages:welcomeerror' => "C'è un problema a salvare il tuo messaggio di benvenuto",
			'pages:welcomeposted' => "Il tuo messaggio di benvenuto è stato inviato",
			'pages:navigation' => "Pagina navigatore",
	
			'item:object:page_top' => 'Top-livello pagine',
			'item:object:page' => 'Pagine',
			'item:object:pages_welcome' => 'Pacchetto pagine di benvenuto',
	
	
		/**
		 * Form fields    ###Campi del modulo###
		 */
	
			'pages:title' => 'Titoli Pagine',
			'pages:description' => 'La tua prima pagina',
			'pages:tags' => 'Tags',	
			'pages:access_id' => 'Accesso',
			'pages:write_access_id' => 'Scrivi accesso',
		
		/**
		 * Status and error messages   ###Stato e messaggi di errore###
		 */
			'pages:noaccess' => 'Nessun accesso alla pagina',
			'pages:cantedit' => 'Non puoi modificare questa pagina',
			'pages:saved' => 'Pagine salvate',
			'pages:notsaved' => 'La pagina non può essere salvata',
			'pages:notitle' => 'Devi specificare un titolo per la tua pagina.',
			'pages:delete:success' => 'La tua pagina è stata cancellata con successo.',
			'pages:delete:failure' => 'La pagina non può essere cancellata.',
	
		/**
		 * Page  ###Pagina###
		 */
			'pages:strapline' => 'Ultimo aggiornamento %s da %s',
	
		/**
		 * History  ###Archivio###
		 */
			'pages:revision' => 'Revisione creata %s da %s',
	
		/**
		 * Submenu items  ###Argomenti submenu###
		 */
			'pages:label:view' => "Vedi pagina",
			'pages:label:edit' => "Modifica pagina",
			'pages:label:history' => "Archivio pagina",
	
		/**
		 * Sidebar items  ###Argomenti Sidebar###
		 */
			'pages:sidebar:this' => "Questa pagina",
			'pages:sidebar:children' => "Sotto-pagine",
			'pages:sidebar:parent' => "Genitore",
	
			'pages:newchild' => "Crea una sotto-pagina",
			'pages:backtoparent' => "Indietro a '%s'",
	);
					
	add_translation("it",$italian);
?>