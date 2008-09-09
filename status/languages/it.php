<?php

	$italian = array(
	
		/**
		 * Menu items and titles  ###Titoli del Menu e titoli###
		 */
	
			'status' => "Stato",
			'status:user' => "Stato di %s",
			'status:posttitle' => "Stato di %s: %s",
			'status:everyone' => "Tutti gli stati del sito",
			'status:strapline' => "%s",
			'status:addstatus' => "Inserisci il tuo stato",
		    'status:messages' => "Messaggi sullo stato",
			'status:text' => "Stato:",
			'status:set' => "inserisci ",
			'status:clear' => "pulisci stato",
			'status:delete' => "cancella stato",
			'status:nostatus' => "Nessuno stato è stato inserito.",
			'status:viewhistory' => "vedi archivio",
	
			'item:object:status' => 'Messaggi sullo stato',
	
	
        /**
	     * Status river  ###Stato su river###
	     **/
	        
	        //generic terms to use
	        'status:river:created' => "%s aggiornato",
	        
	        //these get inserted into the river links to take the user to the entity
	        'status:river:create' => "il suo stato.",
	        
	        
	
		/**
		 * Status messages  ###Messaggi sullo stato###
		 */
	
			'status:posted' => "Il tuo nuovo Stato è stato inviato con successo.",
			'status:deleted' => "Il tuo Stato è stato cancellato.",
	
		/**
		 * Error messages  ###Messaggi di errore###
		 */
	
			'status:blank' => "Scusaci; devi effettivamente scrivere un messaggio sullo stato prima di poterlo salvare.",
			'status:notfound' => "Scusaci; non possiamo trovare il messaggio sullo stato specificato.",
			'status:notdeleted' => "Scusaci; non possiamo cancellare questo messaggio sullo stato.",
			'status:notsaved' => "Qualcosa è andato storto durante il salvataggio, per favore riprova o controlla con il tuo amministratore.",
			'status:problem' => "C'è stato un problema. Sembra che tu non possa modificare questo stato.",
	
	);
					
	add_translation("it",$italian);

?>