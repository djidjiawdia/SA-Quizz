<?php
    include_once 'header.php'; 

    // session_destroy();

    $message = "";
    if(isset($_GET['errorPass'])){
        $message = "Le mot de passe est incorrect";
    }elseif(isset($_GET['errorLog'])){       
        $message = "Utilisateur inconnu!!!";
    }
    // die(var_dump($_SESSION));
    if(!empty($_SESSION['user'])){
        if($_SESSION['user']['role'] === "admin"){
            header('location:/sa_quiz/pages/admin/accueil_admin.php');
        }else{
            header('location:/sa_quiz/pages/joueur/interface_joueur.php');
        }
    }    
?>


<div class="card card-md">
    <div class="card-header connexion-header">
        <h3 class="card-title">Login Form</h3>
        <span>x</span>
    </div>
    <div class="card-body">
        <form action="/sa_quiz/controllers/userCtrl.php" class="form-c" method="post" id="indexForm">
            <div class="form-group">
                <img src="public/images/icones/ic-login.png" alt="ic-login">
                <input type="text" class="form-control bg-input" name="loginConn" placeholder="Login">
            </div>
            <div class="form-group">
                <img src="public/images/icones/ic-password.png" alt="ic-password">
                <input type="password" class="form-control bg-input" name="passwordConn" placeholder="Password">
            </div>
            <div class="form-group-btn">
                <button type="submit" class="btn btn-lg btn-primary">Connexion</button>
                <a href="/sa_quiz/pages/joueur/creer_joueur.php">S'inscrire pour jouer?</a>
            </div>
        </form>
        <?php
            if($message != ""){
                echo '<p style="color:red;">'.$message.'</p>';
            }
        ?>
    </div>
</div>


<?php include_once 'footer.php'; ?>
