<?php
    //connection avec PDO
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));

    //on créé un nouveau client
    function createClient($lastName, $phone, $pdo)
    {
    
    $sql = "INSERT INTO client(lastName, phone)
            VALUES (:lastName,:phone)";
    
    $query= $pdo->prepare($sql);
    
    $query->bindParam(':lastName' ,$lastName);
    $query->bindParam(':phone' ,$phone);
    
    $query->execute();
    
    };

    //si on envois quelque chose
    if(empty($_POST) == false)
    {
        //on retourne les strings en enlevant tous les octets nuls, les balises PHP et HTML
        $lastName = strip_tags($_POST['lastName']);
        $phone = strip_tags($_POST['phone']);
    
        //si au moins une des deux conditions est remplie on fait l'insertion dans la BDD
        if($lastName || $phone)
        {
            createClient($lastName, $phone, $pdo);
        }
        else
        {
            echo 'Veuillez remplir un champs !';
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>

<body>
    <form method="post" action='test.php'>
        <ul style="list-style-type:none; padding:0">
            <li>
                <label>nom :</label>
                <input type='text' name='lastName'>
            </li>
            <li>
                <label>téléphone :</label>
                <input type='text' name='phone'>
            </li>
            <li>
                <input type='submit' value='Envoyer'>
            </li>
        </ul>
    </form>
</body>
</html>
