<?php
/**
 * Created by PhpStorm.
 * User: Hendricksen
 * Date: 10/22/2023
 * Time: 11:05 AM
 */
if(!isset($_SESSION))
{
    session_start();
    if(isset($_SESSION['type_user']))
    {
        header('Location: dashboard.php');
    }else{
        header('Location: login.php');
    }

}

