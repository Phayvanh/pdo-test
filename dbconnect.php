<?php

try
{
    $PDO = new PDO("mysql:host=localhost;dbname=test;charset=UTF8", "root", "G0muG0muN0");
}
catch (PDOException $exceptionObject)
{
    echo 'Erreur de connection PDO (' . $exceptionObject->getCode() . '): ' . $exceptionObject->getMessage();

    exit();
}

