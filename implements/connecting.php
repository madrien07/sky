<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 04/04/2020
 * Time: 12:41
 */
class Connecting
{
    /**
     * @return PDO
     */
    public static function getConnexion()
    {
        try {
            $host = 'mysql:host=localhost;dbname=kubernetes';
            $user = 'root';
            $pwd = '';
            $pdo = new PDO($host, $user, $pwd,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true));
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        return $pdo;
    }
}
