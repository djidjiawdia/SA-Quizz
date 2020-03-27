<?php
    include_once '../../models/questions.php';

    $questions = getQuestions();

    $nbrQ = getNbrQuestion();

    if(isset($_POST) && !empty($_POST)){
        saveNbrQuest($_POST);
    }
    

?>

<div class="admin-card shadow">
    <div class="card-body card-lg">
        <form method="post" class="nbrQuestF" id="nbrQuestForm">
            <label for="nbrQuest">Nombre de question/jeu</label>
            <input type="text" name="nbrQuest" id="nbrQuest" value="<?= @$nbrQ['nbrQuest']; ?>">
            <button class="btn" type="submit">OK</button>
        </form>
        <div class="border border-listeQ" id="listeQ">
            <?php foreach($questions as $k => $q): ?>
            <div class="quest-group tab">
                <h3><?= ($k+1).'. '.$q['question'] ?></h3>
                <div class="responses">
                    <?php foreach($q['reponse'] as $rep): ?>
                        <div class="resp-group">
                            <?php if($q['typeRep'] === "texte"){ ?>
                                <input class="respText" type="text" readonly>
                            <?php }else{ ?>
                                <input class="listeQ-Choix" type="<?= $q['typeRep'] ?>" disabled>
                                <label class="listeQ-label"><?= htmlentities($rep, ENT_QUOTES) ?></label>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
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