<?php include_once '../../header.php'; ?>

<div class="card card-lg">
    <div class="card-header">
        <h1>Créer et paramétrer vos quizz</h1>
        <a href="#">Déconnexion</a>
    </div>
    <div class="card-body row">
        <div class="col-sm">
            <div class="profil-card">
                <div class="profil-card-header">
                    <img class="admin-profil" src="/sa_quiz/public/images/avatar.png" alt="Avatar">
                    <div>
                        <h2 class="prenom">Prenom</h2>
                        <h2 class="nom">NOM</h2>
                    </div>
                </div>
                <div class="profil-card-body">
                    <ul>
                        <li class="active">
                            <a class="nav-link" href="?page=listeQ">Liste Questions</a>
                            <img src="/sa_quiz/public/images/icones/ic-liste.png">
                        </li>
                        <li>
                            <a class="nav-link" href="?page=creerA">Créer Admin</a>
                            <img src="/sa_quiz/public/images/icones/ic-ajout.png">
                        </li>
                        <li>
                            <a class="nav-link" href="?page=listeJ">Liste Joueurs</a>
                            <img src="/sa_quiz/public/images/icones/ic-liste.png">
                        </li>
                        <li>
                            <a class="nav-link" href="?page=creerQ">Créer Question</a>
                            <img src="/sa_quiz/public/images/icones/ic-ajout.png">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="admin-page col-md">
    
        <?php
            if(isset($_GET['page'])){
                switch($_GET['page']){
                    case 'listeQ' : 
                        include_once 'liste_questions.php';
                    break;
                    case 'creerA' :
                        include_once 'creer_admin.php';
                    break;
                    case 'listeJ' :
                        include_once 'liste_joueurs.php';
                    break;
                    case 'creerQ' :
                        include_once 'creer_question.php';
                    break;
                    default :
                        echo '<h3>Page inconnue</h3>';
                    break;
                }
            }else{
                include_once 'liste_questions.php';
            }
        ?>
            
        </div>
    </div>
</div>

<?php include_once '../../footer.php'; ?>
