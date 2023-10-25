<?php

include_once 'connecting.php';
class GlobalFunction
{


    static function extractions($array)
    {
        $data=[];
        foreach ($array as $item)
        {
          $data[]=$item;
        }
        return $data;
    }
    static function insert($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);

            //return "<div class='alert alert-success'>Informations ajoutées avec succes !</div>";
            return true;

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

    static function formaterDate($date)
    {
        $table=explode(' ',$date);

        $dateTab=explode('-',$table[0]);
        $formatDate="";
        $mois="";
        switch ($dateTab[1]) {
            case "01":
              $mois="Janvier";
              break;
            case "02":
                $mois="Fevrier";
              break;
            case "03":
                $mois="Mars";
              break;
            case "04":
                $mois="Avril";;
            break;
            case "05":
                $mois="Mai";
                break;
            case "06":
                $mois="Juin";
                break;
            case "07":
                $mois="Juillet";
                break;
            case "08":
                $mois="Aout";
                break;
            case "09":
                $mois="Septembre";
                break;
            case "10":
                $mois="Octobre";
                break;
            case "11":
                $mois="Novembre";
                break;
            case "12":
                $mois="Decembre";
                break;
            default:
       
              break;   
        }
        return $formatDate="Publié le ".$dateTab[2].' '.$mois.','.$dateTab[0];     
    }

    static function getLinkUrl()
    {
        return  "http://127.0.0.1/evemag/rubrique/";
    }

    static function getLinkSlide()
    {
        return  "http://127.0.0.1/evemag/slide/";
    }
    static function insertCart($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);

           return $con->lastInsertId();

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    static function selectAll($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);

            return $req->fetchAll();

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

    static function search($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute();

            return $req->fetchAll();

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

    static function selectOne($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);

            return $req->fetch();

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

    static function update($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);

            return "<div class='alert alert-success'>Mot de passe ajouter avec succes!</div>";

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

    static function delete($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req1=$con->prepare($req);
            $req1->execute($array);
            
         

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }




    static function checkEmpty($data)
    {
        foreach ($data as $k => $datum)
        {
            if (empty($datum))
            {
                return "<div class='alert alert-danger'>Champs $k vide !</div>";
            }
        }
        return true;
    }

    static function checkIsset($data)
    {
        foreach ($data as $k => $datum)
        {
            if (!isset($datum))
            {
                return "<div class='alert alert-danger'> Données $k requis(e) !</div>";
            }
        }
        return true;
    }

    static function ifExist($table,$champ,$value)
    {
        $con=Connecting::getConnexion();
        $req=$con->prepare('SELECT * FROM '.$table.' WHERE '.$champ.' =?');
        $req->execute(array($value));
        if($req->rowCount()>0)
        {
            return'<div class="alert custom-alert-2 alert-danger alert-dismissible fade show" role="alert">
            <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>Cette valeur existe deja veuillez utiliser une autre valeur !
                        <button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>';;
        }
        return false;
    }


    static function existeChecking($req,$value)
    {
        $con=Connecting::getConnexion();
        $req=$con->prepare($req);
        $req->execute($value);
        if($req->rowCount()>0)
        {
            return true;
        }
        return false;
    }


    static function login($req,$array)
    {
        try {
            $con=Connecting::getConnexion();

            $req=$con->prepare($req);
            $req->execute($array);
            $data=$req->fetch();
            if(is_array($data))
            {
                return $data;
            }

            return '<div class="alert custom-alert-2 alert-danger alert-dismissible fade show" role="alert">
            <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>Username ou Mot de passe incorrect essayer avec votre Email ou numero!
                        <button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        }catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }


    function dectedDoublonsLimiteTroisMois()
    {
        
    }

}