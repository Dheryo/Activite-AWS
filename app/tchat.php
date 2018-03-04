<!DOCTYPE html>

<!--	
	Code adapté issu du cours
	Concevez votre site web avec PHP et MySQL
	TP Mini-chat

	Page du Chat
-->

<html>
	<head>
		<meta charset= "utf-8" />
		<link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
		<title>Mini-chat OpenClassrooms</title>
	</head>

	<body>
		<header>
			<!-- En-tête -->
			<h1>Mini-chat</h1>
		</header>
		
		<section id="main">
			<!-- section principale -->
			<div id="left_side">
				<!-- partie gauche -->
				<section id="post_form" class="bordered_section">
					<!-- section du formulaire de post d'un message -->
					<?php
						$stored_pseudo = "";
						// vérification de l'existence du pseudo dans les cookies
						if (isset($_COOKIE["stored_pseudo"]))							
						{
							// récupération du pseudo stocké en cookie en supprimant les caractères spéciaux
							$stored_pseudo = strip_tags($_COOKIE["stored_pseudo"]);
						}
					?>

					<form action=post_message.php method=post>
						<label for="pseudo">Pseudo : </label>
						<input type="text" name="pseudo" id="pseudo" size='36' maxlength='32' 
							value=<?php echo $stored_pseudo ?> ><br />
						<label for="message">Message :<br /></label>
						<textarea name="message" id="message" rows = '8' cols = '64' maxlength='500' 
							placeholder="Tapez votre message ici..."></textarea><br />
						<input type="submit" value="Envoyer">
					</form>
				</section>

				<section id="update_form" class="bordered_section">
					<!-- section pour le bouton d'actualisation -->
					<form action=tchat.php method=post>
						<input type="submit" value="Actualiser">
					</form>
				</section>

				<section id="informations" class="bordered_section">
					<!-- section pour ajouter des informations -->
					<p>Bienvenue sur le mini-chat de la NASA.</p>
					<p>Pseudos limités à 32 caractères et les messages à 500 caractères.</p>
					<p>Les posts anonymes sont acceptés mais si vous en abusez, nous vous retrouverons !</p>
					<p>Ah, au fait, le webmaster a séché ses cours de Javascript alors il faut actualiser
						la page pour voir les nouveaux posts.</p>
				</section>
			</div>

			<section class="white_window bordered_section">
				<!-- section de fenêtre de discussion -->
				<h2>Fenêtre de discussion</h2>
				<?php
					include("bdd_connexion.php");
					// si pas d'erreur de connexion à la BDD, on affiche les messages
					if ($connected == True)
					{
						$messages = $bdd->query("SELECT pseudo, 
							message, 
							DATE_FORMAT(horodatage, '%d/%m/%Y %T') 
							AS post_date FROM posts ORDER BY id");
						$index = 0;
						while ($message = $messages->fetch())
						{
							// changement de couleur d'un message à l'autre pour mieux les distinguer
							if ($index % 2 == 0)
							{
								echo "<font color='#20F'>";
							}
							else
							{
								echo "<font color='#053'>";
							}
							$index++;
							echo "[" . $message['post_date'] . "] " . $message['pseudo'] . " : "
								 . $message['message'] . "<br /></font>";
						}
					}
					// si erreur de connexion à la BDD, affichage du message d'erreur
					else
					{ 
				?>
						<p>La connexion à la base de données a échoué.</p> 
						<?php echo "<p>" . $error_message . "</p>"; ?>
				<?php }
				?>
			</section>
		</section>
	</body>
</html>