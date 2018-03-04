<!DOCTYPE html>

<!--
    Code adapté issu du cours
    Concevez votre site web avec PHP et MySQL
    TP Page protégée par mot de passe

    Page d'accueil
-->

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
        <title>Page protégée par mot de passe</title>
    </head>
    
    <body>
        <p>Veuillez entrer le mot de passe pour accéder au mini-tchat de la NASA :</p><br />
        <form action="app/secret.php" method="post">
            
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
            
        </form><br />
        <p>Cette page est réservée au personnel de la NASA. Si vous ne travaillez pas à la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
    </body>
</html>