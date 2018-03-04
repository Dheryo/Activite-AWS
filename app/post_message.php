<!-- 
	Code adapté issu du cours
	Concevez votre site web avec PHP et MySQL
	TP Mini-chat
	
	Page de traîtement du post 
-->

<?php 
	$posted_pseudo = "(anonyme)";
	if (isset($_POST["pseudo"]))																							// vérification de l'existence du pseudo
	{
		if ($_POST["pseudo"])
		{
			$posted_pseudo = strip_tags($_POST["pseudo"]);																		// échappement des caractères spéciaux pour le pseudo
			setcookie("stored_pseudo", $posted_pseudo, time() + 365*24*3600, null, null, false, true);							// définition du cookie en http only
		}
	}

	$posted_message = "";
	if (isset($_POST["message"]))																							// vérification de l'existence du message
	{
		$posted_message = strip_tags($_POST["message"]);																	// échappement des caractères spéciaux pour le message
	}

	include("bdd_connexion.php");																							//connexion à la BDD en include car utilisée sur les 2 pages
	$req = $bdd->prepare("INSERT INTO posts (id, pseudo, horodatage, message) VALUES (NULL, :pseudo, NOW(), :message)");
	$req->execute(array('pseudo' => $posted_pseudo, 'message' => $posted_message));

	//retour à la page du mini-chat
	header("Location: tchat.php");
?>
