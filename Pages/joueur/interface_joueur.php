<?php
    include_once '../../header.php'; 
    include_once '../../models/questions.php';
    include_once '../../models/users.php';
    if(empty($_SESSION['user'])){
        header('location:/sa_quiz/');
    }else if($_SESSION['user']['role'] === "admin"){
        header('location:/sa_quiz/pages/admin/accueil_admin.php');
    }
    $n = getNbrQuestion()['nbrQuest'];
    $questions = interfaceQuestions();

    // die(var_dump($_SESSION['user']));
    if(isset($_POST['terminer'])){
        var_dump($_POST);
        // if(isset($_COOKIE['score'])){
        //     $score = $_COOKIE['score'];
        //     if($score > $_SESSION['user']['score']){
        //         $message = "Bravooooo nouveau score : $score";
        //         if(changeScore($_SESSION['user']['login'], $_SESSION['user']['score'])){
        //             unset($_SESSION['score']);
        //             // header('location:/sa_quiz/pages/joueur/interface_joueur.php?newScore');
        //         }
        //     }
        // }
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
        <div class="interface-joueur row">
            <div class="col-md">
                <?php if(isset($_GET['terminer'])){ ?>
                    <div class="result">
                        <?php if(isset($_COOKIE['score'])){
                            if($_SESSION['user']['score'] < $_COOKIE['score']){
                                $_SESSION['user']['score'] = $_COOKIE['score'];
                                if(changeScore($_SESSION['user']['login'], $_SESSION['user']['score'])){
                                    echo '<h4>Félicitation!!! Nouveau score : '.$_SESSION['user']['score'].'</h4>';
                                }
                            }else{
                                echo '<h4>Score : '.$_COOKIE['score'].'</h4>';
                            } 
                            unset($_COOKIE['score']);
                        }?>

                        <a href="/sa_quiz/pages/joueur/interface_joueur.php" class="btn btn-light">Rejouer</a>
                    </div>
                <?php }else{ ?>
                    <form method="post" class="interfaceForm border border-blue" id="interfaceForm">
                        <?php foreach($questions as $k => $q): ?>
                        <div class="tabInterface">
                            <div class="interface-input">
                                <div class="form-textarea interface-txtarea bg-input" readonly>
                                    <h3><?= 'Question '.($k+1).'/'.$n ?></h3>
                                    <p><?= $q['question'] ?></p>
                                </div>
                                <input class="interface-pts bg-input" type="text" value="<?= $q['nbrPoints'].' pts' ?>">
                            </div>
                            <div class="interface-resp">
                                <?php foreach($q['reponse'] as $x => $rep): ?>
                                    <div class="resp-group">
                                        <?php if($q['typeRep'] === "texte"){ ?>
                                            <input id="repText" class="respText" name="<?= 'respText'.($k+1) ?>" type="text">
                                        <?php }else{ ?>
                                            <input id="resp" class="interface-Choix" value="<?= $x ?>" type="<?= $q['typeRep'] ?>" name="<?= 'resp'.($k+1).'[]' ?>">
                                            <label class="interface-label"><?= htmlentities($rep, ENT_QUOTES) ?></label>
                                            <?php } ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="interface-btns">
                            <button id="prev" class="btn btn-md btn-secondary">Précédent</button>
                            <button id="next" class="btn btn-md btn-light">Suivant</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
            <div class="col-sm">
                <div class="tab-score">
                    <div class="menu-tab-score">
                        <button class="btn-score">Top scores</button>
                        <button class="btn-score">Mon meilleur score</button>
                    </div>
                    <div class="score-body">
                        <div class="top-score">
                            <p>hjxgfchbkbjc</p>
                            <p>hjxgfchbkbjc</p>
                            <p>hjxgfchbkbjc</p>
                            <p>hjxgfchbkbjc</p>
                            <p>hjxgfchbkbjc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // pass PHP variable declared above to JavaScript variable
    const tabs = <?php echo json_encode($questions) ?>;
</script>

<?php include_once '../../footer.php'; ?>