<!DOCTYPE html>

<!--
    Code adapté issu du présent cours
    TP Le cloud uploader

    Script d'envoie du fichier
-->

<?php
    require '../assets/aws_sdk/aws-autoloader.php';

    use Aws\Credentials\CredentialProvider;
    use Aws\S3\S3Client;
?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
        <title>Upload</title>
    </head>

    <body>
        <?php
        // TODO : indiquez le nom de votre bucket
        $bucket = 'bucket-test-ocr';
                                
        // TODO : les accès à AWS doivent déjà être configurés dans un fichier .ini sur votre machine
        // Voir : https://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/credentials.html#credential-profiles
        $profile = 'test';
        $path = '/home/bitnami/.aws/credentials/credentials.ini';

        $provider = CredentialProvider::ini($profile, $path);
        $provider = CredentialProvider::memoize($provider);

        $s3 = new S3Client([
                // TODO : indiquez le nom de la région de votre bucket S3
                // Voir : https://docs.aws.amazon.com/fr_fr/general/latest/gr/rande.html
                'region' => 'eu-west-3',
                'version' => '2006-03-01',
                'credentials' => $provider
            ]);

        try {
            $s3->waitUntil('BucketExists', ['Bucket' => 'bucket-test-ocr']); 
            echo '<p>Connexion effectuée</p>';
        }
        catch(Exception $e) {
            $error_message = "Erreur : ".$e->getMessage();
            echo '<p>La connexion au compartiment a échoué.</p>';
            echo '<p>' . $error_message . '</p>';
        }

        // Envoi du fichier
        $put_params = [
            'Bucket' => $bucket,
            'Key'    => time() . '_' . $_FILES['uploadfile']['name'],
            'SourceFile' => $_FILES['uploadfile']['tmp_name']
        ];
        $result = $s3->putObject($put_params);

        echo '<p>Fichier uploadé !</p>';
        echo '<p><a href="' . $result['ObjectURL'] . '">' . $result['ObjectURL'] . '</a></p>';
        echo '<p><img src="' . $result['ObjectURL'] . '" alt="" /></p>';
        ?>
    </body>
</html>
