<?php
	
	// Connexion à la base de données
	require_once 'dbconnect.php';

	class Client
	{
		private $DBConnection;
    	
    	public function __construct($DBConnection)
    	{
        	$this->setDBConnection($DBConnection);
    	}
    	
    	public function setDBConnection(PDO $DBConnectionObject)
    	{
        	$this->DBConnection = $DBConnectionObject;
 		}

		public function createClient($lastName, $phone)
		{
		    $sql = "INSERT INTO client(lastName, phone)
            		VALUES (:lastName,:phone)";
    
    		$query= $this->DBConnection->prepare($sql);
    
    		$query->bindParam(':lastName' ,$lastName);
    		$query->bindParam(':phone' ,$phone);
    
    		$query->execute();
		}
	}

	$client = new Client($PDO);

	if(empty($_POST) == false)
    {
        //on retourne les strings en enlevant tous les octets nuls, les balises PHP et HTML
        $lastName = strip_tags($_POST['lastName']);
        $phone = strip_tags($_POST['phone']);
    
        //si au moins une des deux conditions est remplie on fait l'insertion dans la BDD
        if($lastName || $phone)
        {
            $client->createClient($lastName, $phone);
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