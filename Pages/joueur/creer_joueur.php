<?php 
    include_once '../../header.php';
    include_once '../../models/users.php';

    $nameAvatar = "Avatar du joueur";
    $title = "Pour tester votre niveau de culture générale";


    if(!empty($_POST)){
        extract($_POST);
        if(searchLogin($login)){
            header("location:/sa_quiz/pages/joueur/creer_joueur.php?errorLog");
        }else{
            
            $fileName = $_FILES['avatar']['name'];
            $fileExt = explode(".", $fileName);
            $fileActExt = strtolower(end($fileExt));
            
            $newFileName = $login.".".$fileActExt;
            $fileDest = '../../uploads/'.$newFileName;
            $path = "/sa_quiz/uploads/".$newFileName;
            if(saveUser($nom, $prenom, $login, $password, $path, "joueur")){
                move_uploaded_file($_FILES['avatar']['tmp_name'], $fileDest);
                header('location:/sa_quiz/pages/joueur/interface_joueur.php?');
            }else{
                header("location:/sa_quiz/pages/joueur/creer_joueur.php?errorSave");
            }
    
        }
    }
    
    
    
    include_once '../inscription.php';
?>

<?php include_once '../../footer.php'; ?>