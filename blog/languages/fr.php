<?php
	/**
	 * translation by RONNEL Jérémy
	 * jeremy.ronnel@elbee.fr
	 */
     
	$french = array(
	
		/**
		 * Menu items and titles
		 */
	
			'blog' => "Blog",
			'blogs' => "Blogs",
			'blog:user' => "Le blog de %s",
			'blog:user:friends' => "Les blogs des amis de %s",
			'blog:your' => "Votre blog",
			'blog:posttitle' => "Le blog de %s : %s",
			'blog:friends' => "Les blogs de mes amis",
			'blog:yourfriends' => "Les derniers articles de vos amis",
			'blog:everyone' => "Tous les blogs",
	
			'blog:read' => "Lire le blog",
	
			'blog:addpost' => "Ecrire un article dans le blog",
			'blog:editpost' => "Editer l'article du blog",
	
			'blog:text' => "Article",
	
			'blog:strapline' => "%s",
			
			'item:object:blog' => 'Articles du blog',
	
			
         /**
	     * Blog river
	     **/
	        
	        //generic terms to use
	        'blog:river:created' => "%s a écrit",
	        'blog:river:updated' => "%s a mis à jour",
	        'blog:river:posted' => "%s a écrit",
	        
	        //these get inserted into the river links to take the user to the entity
	        'blog:river:create' => "a new blog post.",
	        'blog:river:update' => "a blog post.",
	        'blog:river:annotate:create' => "a comment on a blog post.",
			
	
		/**
		 * Status messages
		 */
	
			'blog:posted' => "Votre article a été ajouté avec succès.",
			'blog:deleted' => "Votre article a été supprimé.",
	
		/**
		 * Error messages
		 */
	
			'blog:save:failure' => "Une erreur est survenue lors de la sauvegarde de votre article, veuillez recommencer.",
			'blog:blank' => "Veuillez renseigner un titre et un corps d'article.",
			'blog:notfound' => "Désolé, l'article demandé n'a pas été trouvé.",
			'blog:notdeleted' => "Désolé, il vous est impossible de supprimer cet article.",
	
	);
					
	add_translation("fr",$french);

?>
