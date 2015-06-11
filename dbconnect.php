<?php

try
{
    $PDO = new PDO("mysql:host=localhost;dbname=test;charset=UTF8", "root", "");
}
catch (PDOException $exceptionObject)
{
    echo 'Erreur de connection PDO (' . $exceptionObject->getCode() . '): ' . $exceptionObject->getMessage();

    exit();
}

