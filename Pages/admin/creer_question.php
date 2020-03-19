<div class="admin-card creerQ">
    <h1>Paramétrer votre question</h1>
    <form class="border" method="post">
        <div class="form-group-q row">
            <div class="col-sm">
                <label for="question">Questions</label>
            </div>
            <div class="col-md">
                <textarea class="bg-input" name="question" id="question"></textarea>
            </div>
        </div>
        <div class="form-group-q row">
            <div class="col-sm">
                <label for="nbrPoints">Nbre de points</label>
            </div>
            <div class="col-md">
                <input class="input-number bg-input" type="number" id="nbrPoints" name="nbrPoints">
            </div>
        </div>
        <div class="form-group-q row">
            <div class="col-sm">
                <label for="typeRep">Type de réponse</label>
            </div>
            <div class="col-md input-group">
                <select class="select-input bg-input" name="typeRep" id="typeRep">
                    <option value="" selected disabled>Donnez le type de réponse</option>
                    <option value="radio">Choix simple</option>
                    <option value="checkbox">Choix multiple</option>
                    <option value="texte">Choix texte</option>
                </select>
                <button class="addInput">+</button>
            </div>
        </div>
        <div class="response" id="resp">
            <div class="form-group-q row">
                <div class="col-sm">
                    <label for="reponse1">Réponse 1</label>
                </div>
                <div class="col-md input-group">
                    <input class="rep-input bg-input" type="text" id="reponse1" name="reponse1">
                    <div class="typeChoix">
                        <input type="checkbox" name="repC" id="repC">
                        <input type="radio" name="repC" id="repC">
                        <img src="/sa_quiz/public/images/icones/ic-supprimer">
                    </div>
                </div>
            </div>
        </div>
        <div class="enregistrer">
            <button class="btn btn-md btn-light">Enregistrer</button>
        </div>
    </form>
</div>