<!DOCTYPE html>

<!--	
    Code adapté issu du cours
    Concevez votre site web avec PHP et MySQL
    TP Page protégée par mot de passe

    Page accessible en tapant le mot de passe kangourou
-->

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
        <title>Codes d'accès au serveur central de la NASA</title>
    </head>
    
    <body>
    
        <?php
        // Si le mot de passe est bon
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou")
        {
        // On affiche les codes et les services
        ?>
            <div id="main">
                <section id="left_side" class="white_window bordered_section">
                    <h1>Voici les codes d'accès :</h1>
                    <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
                    <p>
                    Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
                    La NASA vous remercie de votre visite.
                    </p>
                </section>

                <section id="small_side" class="white_window bordered_section">
                    <h1>Services internes :</h1>
                    <a href="tchat.php">Mini-chat des employés</a><br />
                    <a href="uploader.php">Hébergement de fichiers sensibles</a>
                </section>
            </div>
        <?php
        }
        else // Sinon, on affiche un message d'erreur
        {
            echo '<p>Mot de passe incorrect</p>';
        }
        ?>
    </body>
</html>