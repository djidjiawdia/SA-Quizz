<?php
    include_once '../../models/questions.php';

    $questions = getQuestions();

    if(isset($_POST) && !empty($_POST)){
        setcookie("nbrQuest", (int)$_POST['nbrQuest'], time()+360*24*3600);
    }
    

?>

<div class="admin-card shadow">
    <div class="card-body card-lg">
        <form method="post" class="nbrQuestF" id="nbrQuestForm">
            <label for="nbrQuest">Nombre de question/jeu</label>
            <input type="text" name="nbrQuest" id="nbrQuest" value="<?= @$_COOKIE['nbrQuest']; ?>">
            <button class="btn" type="submit">OK</button>
        </form>
        <div class="border border-listeQ" id="listeQ">
            <?php foreach($questions as $k => $q): ?>
            <div class="quest-group">
                <h3><?= ($k+1).'. '.$q['question'] ?></h3>
                <div class="responses">
                    <?php for($i=1; true; $i++){
                        if(isset($q["reponse{$i}"])){ ?>
                            <div class="resp-group">
                                <?php if($q['typeRep'] === "texte"){ ?>
                                    <input class="respText" type="text" readonly>
                                <?php }else{ ?>
                                    <input type="<?= $q['typeRep'] ?>" disabled>
                                    <label><?= htmlentities($q["reponse{$i}"], ENT_QUOTES) ?></label>
                                <?php } ?>
                            </div>
                        <?php }else{break;
                        }
                    } ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="card-footer">
        <button id="prev" class="btn btn-md btn-secondary">Précédent</button>
        <button id="next" class="btn btn-md btn-light">Suivant</button>
    </div>
</div>