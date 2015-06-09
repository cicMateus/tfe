$(document).ready(function(){
	/*Ici c'est le js qui va s'occuper de refresh toutes les X secondes*/

	setInterval(function(){	/*créer un interval répétitif qui répète cette fonction toutes les ....*/
		$.post("membres_connectes.php", {
			"request" : "membre"
		},	/*la requete post qui fonctionne comme un formulaire html*/
		function(data){	/*callback de la requete php*/
			data = jQuery.parseJSON(data);	/*dit a php que les données sont en json*/
			$("#statut").empty(); /*retire tout le contenu de messages (sinon il ajoute à chaque fois tous les messages aux anciens, même ceux qui ont déjà été affichés*/
			for(var i=0; i<data.membres_connectes.length; i++)/*boucle qui parcours tous les messages du json*/
			{
				/*data-id n'est pas utilisé par le html mais ça te permettra de récupérer l'id de ton message en js pour si jamais tu en as besoin et c'est accepté par le html, c'est justement prévu pour ce genre d'action ;-)*/
				$("#statut").append(' \
					<div data-id="'+data.membres_connectes[i].id+'"> \
						<span>'+data.membres_connectes[i].day+', '+data.membres_connectes[i].time+'</span> \
						<p>'+data.membres_connectes[i].name+' a écrit</p> \
						<p>'+data.membres_connectes[i].text+'</p> \
					</div> \
				'); /*le append ajoute ces balises avec le contenu provenant du json aux bons endroits*/
			}
		});
	}, 1000);	/*.... 1 seconde*/


});