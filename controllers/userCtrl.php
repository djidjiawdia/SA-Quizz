<?php
session_start();
include_once '../models/users.php';

$message = "";

if(isset($_POST['loginConn']) && isset($_POST['passwordConn'])){
    extract($_POST);
    $user = searchLogin($loginConn);
    if($user){
        if($user['password'] === $passwordConn){
            $_SESSION['user'] = [
                "nom" => $user["nom"],
                "prenom" => $user["prenom"],
                "login" => $user["login"],
                "role" => $user["role"],
                "profil" => $user["profil"],
                "score" => $user["score"]
            ];
            if($user['role'] === "admin"){
                header('location:/sa_quiz/pages/admin/accueil_admin.php');
            }else{
                header('location:/sa_quiz/pages/joueur/interface_joueur.php');
            }
        }else{
            header('location:/sa_quiz/index.php?errorPass');
        }
    }else{
        header('location:/sa_quiz/index.php?errorLog');
    }
}

if(isset($_GET['deconnexion'])){
    $_SESSION['user'] = [];
    unset($_SESSION['user']);
    header('location:/sa_quiz/');
}