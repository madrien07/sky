<?php


if(!isset($_SESSION))
{
    session_start();
}


include_once '../implements/GlobalFunction.php';



if(isset($_POST['username'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
{
    $req="SELECT * FROM users WHERE username=? AND password=?";

    $result=GlobalFunction::selectOne($req,[$_POST['username'],$_POST['username']]);

    if(is_array($result))
    {
        $_SESSION['username']=$result['username'];
        header('Location: ../visitor.php');
    }else{
        $_SESSION['err']="<div class='alert alert-danger'>Login ou mot de passe incorrecte !</div>";
        header('Location: ../login.php');
    }

}else{

    $_SESSION['err']="<div class='alert alert-danger'>Veuillez remplir tous les champs !</div>";
    header('Location: ../login.php');
}

