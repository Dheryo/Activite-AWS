<!--
	Code adapté issu du cours
	Concevez votre site web avec PHP et MySQL
	TP Mini-chat

	Script de connexion à la BDD
-->

<?php
	try
		{
			/* 
				TODO : placer un fichier bdd_credentials.json sur votre serveur EC2
					dans un dossier extérieur au projet, par exemple le dossier ~/.aws/credentials
					et le remplir selon le modèle suivant :
					{
						"dbhost": "point de terminaison de votre instance RDS",
						"dbport": "port utilisé, par défaut 3306",
						"dbname": "nom de la table",
						"username": "identifiant de l'instance RDS",
						"password": "mot de passe de l'instance RDS"
					}
			*/
			// TODO : indiquer le chemin complet vers le fichier		
			$path = '/home/bitnami/.aws/credentials/bdd_credentials.json';

			$bdd_credentials_encoded = file_get_contents($path);
			$bdd_credentials = json_decode($bdd_credentials_encoded);

			$dbhost = $bdd_credentials ->{"dbhost"};
			$dbport = $bdd_credentials ->{"dbport"};
			$dbname = $bdd_credentials ->{"dbname"};
			
			$dbrequest = "mysql:host={$dbhost};port={$dbport};dbname={$dbname}";

			$username = $bdd_credentials ->{"username"};
			$password = $bdd_credentials ->{"password"};

			$bdd = new PDO($dbrequest, $username, $password);
			$connected = True;
		}
	catch(Exception $e)
		{
			$error_message = "Erreur : ".$e->getMessage();
			$connected = False;
		}
?>