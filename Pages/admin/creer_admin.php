<?php

    require_once '../../models/users.php';

    $nom = "";
    $prenom = "";
    $login = "";
    $password = "";
    $passConfirm = "";
    $role = "admin";

    $nameAvatar = "Avatar admin";
    $title = "Pour proposer des quizz";

    if(!empty($_POST)){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        if(searchLogin($login)){
            header("location:/sa_quiz/pages/admin/accueil_admin.php?page=creerA&errorLog");
        }else{
            
            $fileName = $_FILES['avatar']['name'];
            $fileExt = explode(".", $fileName);
            $fileActExt = strtolower(end($fileExt));
            
            $newFileName = $login.".".$fileActExt;
            $fileDest = '../../uploads/'.$newFileName;
            $path = "/sa_quiz/uploads/".$newFileName;
            
            if(saveUser($nom, $prenom, $login, $password, $path, $role)){
                move_uploaded_file($_FILES['avatar']['tmp_name'], $fileDest);
                header('location:/sa_quiz/pages/admin/accueil_admin.php?page=listeJ');
            }else{
                header("location:/sa_quiz/pages/admin/accueil_admin.php?page=creerA&errorSave");
            }
    
        }
    }

    include_once '../inscription.php';

?>