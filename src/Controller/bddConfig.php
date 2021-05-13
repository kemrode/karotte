<?php

function configBDD(){

    global $bdd;

    $hostname="mysql-karotte.alwaysdata.net";
    $username="karotte";
    $password="KarotteDu76";
    $dbname="karotte_db";

    try {
        $bdd = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}
?>