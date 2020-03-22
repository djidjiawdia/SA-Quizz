<?php
    include_once '../../header.php'; 
    if(empty($_SESSION['user'])){
        header('location:/sa_quiz/');
    }else if($_SESSION['user']['role'] === "admin"){
        header('location:/sa_quiz/pages/admin/accueil_admin.php');
    }
?>

<div class="card card-lg">
    <div class="card-header">
        <div class="profil-joueur">
            <img class="icon-profil-joueur" src="<?= $_SESSION['user']['profil'] ?>" alt="Avatar">
            <div class="nom-joueur">
                <h5 class="prenom"><?= $_SESSION['user']['prenom']; ?></h5>
                <h5 class="nom"><?= $_SESSION['user']['nom']; ?></h5>
            </div>
        </div>
        <h1>Créer et paramétrer vos quizz</h1>
        <a href="/sa_quiz/controllers/userCtrl?deconnexion" id="deconnexion">Déconnexion</a>
    </div>
    <div class="card-body">

    </div>
</div>

<?php include_once '../../footer.php'; ?>