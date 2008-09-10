<?php

     /**
	 * Elgg Plugin language pack
	 * 
	 * @package Elgg Messages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 * ****************************************
     * @Italian Language Pack
     * @Plugin: Messages
     * @version: beta 00000
     * @translation by Lord55  
     * @link http://www.nobilityofequals.com
     ****************************************/

	$italian = array(
	
		/**
		 * Menu items and titles   ###Argomenti menu e titoli###
		 */
	
			'messages' => "Messaggi",
            'messages:back' => "indietro ai messaggi",
			'messages:user' => "Il tuo inbox",
			'messages:sentMessages' => "Manda messaggio",
			'messages:posttitle' => "Messaggi di %s: %s",
			'messages:inbox' => "Inbox",
			'messages:send' => "Manda un messaggio",
			'messages:sent' => "Manda i messaggi",
			'messages:message' => "Messaggio",
			'messages:title' => "Titolo",
			'messages:to' => "A",
            'messages:from' => "Da",
			'messages:fly' => "Lascialo volare",
			'messages:replying' => "Messaggio di risposta a ",
			'messages:inbox' => "Inbox",
			'messages:sendmessage' => "Manda un messaggio",
			'messages:compose' => "Manda un messaggio",
			'messages:sentmessages' => "Manda i messaggi",
			'messages:recent' => "Messaggi recenti",
            'messages:original' => "Messaggio originale",
            'messages:yours' => "Il tuo messaggio",
            'messages:answer' => "Rispondi",
			
			'item:object:messages' => 'Messaggi',
	
		/**
		 * Status messages   ###Stato dei messaggi###
		 */
	
			'messages:posted' => "Il tuo messaggio è stato mandato con successo.",
			'messages:deleted' => "Il tuo messaggio è stato cancellato con successo.",
	
		/**
		 * Email messages  ###Messaggi email###
		 */
	
			'messages:email:subject' => 'Hai un nuovo messaggio!',
			'messages:email:body' => "Hai un nuovo messaggio da %s. Leggi:

			
%s


Per vedere il tuo messaggio, clicca qui:

	%s

Per mandare %s un messaggio, clicca qui:

	%s

Non puoi rispondere a questa email.",
	
		/**
		 * Error messages   ###Messaggi di errore###
		 */
	
			'messages:blank' => "Scusaci; devi effettivamente inserire qualcosa nel corpo del messaggio prima di poterlo salvare.",
			'messages:notfound' => "Scusaci; non possiamo trovare il messaggio specificato.",
			'messages:notdeleted' => "Scusaci; non possiamo cancellare questo messaggio.",
			'messages:nopermission' => "Non hai il permesso di cancellare quel messaggio.",
			'messages:nomessages' => "Non ci sono messaggi da visualizzare.",
			'messages:user:nonexist' => "Non possiamo trovare il destinatario nel database dell'utente.",
	
	);
					
	add_translation("it",$italian);

?>