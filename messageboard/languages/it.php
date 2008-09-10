<?php

     /**
	 * Elgg Plugin language pack
	 * 
	 * @package Elgg MessageBoard
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * ****************************************
     * @Italian Language Pack
     * @Plugin: MessageBoard
     * @version: beta 00000
     * @translation by Lord55  
     * @link http://www.nobilityofequals.com
     ****************************************/

	$italian = array(
	
		/**
		 * Menu items and titles   ###Titoli del menu e vari###
		 */
	
			'messageboard:board' => "Messaggi di bordo",
			'messageboard:messageboard' => "messaggio di bordo",
			'messageboard:viewall' => "Vedi tutti",
			'messageboard:postit' => "Invialo",
			'messageboard:history' => "archivio",
			'messageboard:none' => "Non c'è ancora nulla su questa messaggistica di bordo",
			'messageboard:num_display' => "Numero di messaggi da visualizzare",
			'messageboard:desc' => "Questa è una messaggistica di bordo che potresti mettere sul tuo profilo e su cui gli altri utenti potrebbero commentare.",
			
         /**
	     * Message board widget river   ###Widget Messaggi di bordo su river###
	     **/
	        
	        'messageboard:river:annotate' => "%s ha un nuovo commento inviato su Messaggi di bordo.",
	        'messageboard:river:create' => "%s ha aggiunto il widget Messaggi di bordo.",
	        'messageboard:river:update' => "%s ha aggiornato il suo widget Messaggi di bordo.",
			
		/**
		 * Status messages   ###Messaggi sullo stato###
		 */
	
			'messageboard:posted' => "Hai inviato con successo su Messaggi di bordo.",
			'messageboard:deleted' => "Hai cancellato il messaggio con successo.",
	
		/**
		 * Email messages   ###Messaggi Email###
		 */
	
			'messageboard:email:subject' => 'Hai un nuovo commento su Messaggi di bordo!',
			'messageboard:email:body' => "Hai un nuovo commento su Messaggi di bordo da %s. Leggi:

			
%s


Per vedere i tuoi commenti su Messaggi di bordo, clicca qui

	%s

Per vedere il profilo di %s, clicca qui:

	%s

Non puoi replicare a questa email.",
	
		/**
		 * Error messages    ###Messaggi di errore###
		 */
	
			'messageboard:blank' => "Scusaci; devi effettivamente inserire qualcosa nell'area messaggi prima che sia possibile salvarlo.",
			'messageboard:notfound' => "Scusaci; non possiamo trovare l'argomento specificato.",
			'messageboard:notdeleted' => "Scusaci; non possiamo cancellare questo messaggio.",
	     
			'messageboard:failure' => "E' accaduto un errore inaspettato nell'aggiungere il tuo messaggio. Per favore riprova.",
	
	);
					
	add_translation("it",$italian);

?>