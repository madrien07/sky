<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 10/22/2023
 * Time: 11:09 AM
 */

if(!isset($_SESSION))
{
    session_start();

}

session_destroy();
header('Location: ../auth-login.php');