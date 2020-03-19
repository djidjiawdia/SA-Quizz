<div class="admin-card creerQ">
    <h1>Paramétrer votre question</h1>
    <form class="formQ" method="post">
        <div class="form-group-q">
            <label for="question">Questions</label>
            <textarea name="question" id="question" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group-q">
            <label for="nbrPoints">Nbre de points</label>
            <input type="number" id="nbrPoints" name="nbrPoints">
        </div>
        <div class="form-group-q">
            <label for="typeRep">Type de réponse</label>
            <select name="typeRep" id="typeRep">
                <option value="" selected disabled>Donnez le type de réponse</option>
                <option value="radio">Choix simple</option>
                <option value="checkbox">Choix multiple</option>
                <option value="texte">Choix texte</option>
            </select>
            <button><img src="/sa_quiz/public/images/icones/ic-ajout.png"></button>
        </div>

    </form>
</div>