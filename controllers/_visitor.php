<?php
/**
 * Created by PhpStorm.
 * User: MIM
 * Date: 25/10/2023
 * Time: 09:09
 */

if(!isset($_SESSION))
{
    session_start();
}


include_once '../implements/connecting.php';


$con=Connecting::getConnexion();

$req=$con->prepare('INSERT INTO visitor SET name_user=?,surname=?,phone_number=?,reason=?,gender=?');
$req->execute([$_POST['name'],$_POST['surname'],$_POST['phone_number'],$_POST['reason'],$_POST['gender']]);

header('Location: ../list-visitor.php');






