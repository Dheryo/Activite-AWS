<!DOCTYPE html>

<!--	
    Code adapté issu du présent cours
    TP Le cloud uploader

    Page du formulaire d'envoie de fichier
-->

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
        <title>Cloud Uploader</title>
    </head>

    <body>
        <h1>Bienvenue dans le Cloud Uploader</h1>
        
        <section id="small_side" class="white_window bordered_section">
            <p>Qu'allez-vous uploader aujourd'hui ?</p>

            <form method="post" action="upload.php" enctype="multipart/form-data">
                <p><input type="file" name="uploadfile" /></p>
                <p><input type="submit" value="Uploadez-moi !" /></p>
            </form>
        </section>
    </body>
</html>