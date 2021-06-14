<?php
namespace src\Model;
use PDO;

require_once ROOT."./configProd.php";

class BDD
{
    private static $_instance = null;

    protected function __construct()
    {
    } // Constructeur en privé.

    protected function __clone()
    {
    } // Méthode de clonage en privé aussi et vide pour empêcher le clonage


    public static function initInstance()
    {
        try {

            SELF::$_instance = new PDO('mysql:host='.hostname.';dbname='.dbname.';charset=utf8', username, password);
            SELF::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (\Exception $e) {
            SELF::$_instance = 'Erreur : ' . $e->getMessage();
            SELF::$_instance = 'Erreur : ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (SELF::$_instance == null) {
            SELF::initInstance();
        }
        return SELF::$_instance;
    }
}