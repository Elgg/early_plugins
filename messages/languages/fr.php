<?php
	/**
	 * translation by RONNEL Jérémy
	 * jeremy.ronnel@elbee.fr
	 */
     
	$french = array(
	
		/**
		 * Menu items and titles
		 */
	
			'messages' => "Messages",
            'messages:back' => "Retour",
			'messages:user' => "Boîte de réception",
			'messages:sentMessages' => "Eléments envoyés",
			'messages:posttitle' => "Les messages de %s : %s",
			'messages:inbox' => "Boîte de réception",
			'messages:send' => "Envoyer un message",
			'messages:sent' => "Eléments envoyés",
			'messages:message' => "Message",
			'messages:title' => "Titre",
			'messages:to' => "A ",
            'messages:from' => "De ",
			'messages:fly' => "Envoyer",
			'messages:replying' => "En réponse à",
			'messages:inbox' => "Boîte de réception",
			'messages:sendmessage' => "Envoyer un message",
			'messages:compose' => "Envoyer un message",
			'messages:sentmessages' => "Eléments envoyés",
			'messages:recent' => "Messages récents",
            'messages:original' => "Message original ",
            'messages:yours' => "Votre message ",
            'messages:answer' => "Répondre",
			
			'item:object:messages' => 'Messages',
	
		/**
		 * Status messages
		 */
	
			'messages:posted' => "Votre message a bien été envoyé.",
			'messages:deleted' => "Le message a bien été supprimé.",
	
		/**
		 * Email messages
		 */
	
			'messages:email:subject' => 'Vous avez un nouveau message !',
			'messages:email:body' => "Vous avez un nouveau message de %s. Il dit :

			
%s


Pour visualiser ce message, cliquez ici :

	%s

Pour répondre à %s, cliquez ici :

	%s

Ne répondez pas à ce mail.",
	
		/**
		 * Error messages
		 */
	
			'messages:blank' => "Vous devez renseigner le corps du message avant envoi.",
			'messages:notfound' => "Impossible de trouvé le message spécifié.",
			'messages:notdeleted' => "Impossible de supprimer le message.",
			'messages:nopermission' => "Désolé, vous n'avez pas l'autorisation de supprimer ce message.",
			'messages:nomessages' => "Aucun message trouvé.",
			'messages:user:nonexist' => "Impossible de trouver le destinataire du message sur le site.",
	
	);
					
	add_translation("fr",$french);

?>