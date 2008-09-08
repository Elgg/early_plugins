<?php
	/**
	 * translation by RONNEL Jérémy
	 * jeremy.ronnel@elbee.fr
	 */
     
	$french = array(
	
		/**
		 * Menu items and titles
		 */
	
			'messageboard:board' => "Forum",
			'messageboard:messageboard' => "forum",
			'messageboard:viewall' => "Voir tout",
			'messageboard:postit' => "Post it",
			'messageboard:history' => "historique",
			'messageboard:none' => "Il n'y a rien dans le forum actuellement",
			'messageboard:num_display' => "Nombre de messages à afficher",
			'messageboard:desc' => "Ceci est un forum, vous pouvez lancer un sujet de discussions que tous les autres utilisateurs pourront commenter.",
			
         /**
	     * Message board widget river
	     **/
	        
	        'messageboard:river:annotate' => "Un nouveau commentaire a été ajouté à %s.",
	        'messageboard:river:create' => "%s a ajouté le widget forum.",
	        'messageboard:river:update' => "%s a mis à jour son widget forum.",
			
		/**
		 * Status messages
		 */
	
			'messageboard:posted' => "Votre sujet de discussion a bien été ajouté au forum.",
			'messageboard:deleted' => "Le message a bien été supprimé du forum.",
	
		/**
		 * Email messages
		 */
	
			'messageboard:email:subject' => 'Vous avez un nouveau commentaire !',
			'messageboard:email:body' => "Un nouveau commentaire a été ajouté par %s. Il dit :

			
%s


Pour voir cette discussion cliquez ci-dessous :

	%s

Pour voir le profil de %s cliquez ici:

	%s

Ne répondez pas à ce mail.",
	
		/**
		 * Error messages
		 */
	
			'messageboard:blank' => "Le corps du message est obligatire avant de le poster.",
			'messageboard:notfound' => "Impossible de trouvé l'objet spécifié.",
			'messageboard:notdeleted' => "Impossible de supprimé l'objet spécifié.",
	     
			'messageboard:failure' => "Une erreur est survenue lors de la sauvegarde du message, veuillez recommencer.",
	
	);
					
	add_translation("fr",$french);

?>