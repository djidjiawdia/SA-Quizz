<?php
    include_once '../models/questions.php';

    if(isset($_POST) && !empty($_POST)){
        if(saveQuestion($_POST)){
            header('location:/sa_quiz/pages/admin/accueil_admin.php?page=listeQ');
        }else{
            header('location:/sa_quiz/pages/admin/acceuil_admin.php?page=creerQ&error');
        }
    }

?>

