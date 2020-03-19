<?php include_once 'header.php'; ?>


<div class="card card-md">
    <div class="card-header connexion-header">
        <h3 class="card-title">Login Form</h3>
        <span>x</span>
    </div>
    <div class="card-body">
        <form class="form-c" method="post">
            <div class="form-group">
                <img src="public/images/icones/ic-login.png" alt="ic-login">
                <input type="text" class="form-control bg-input" name="login" placeholder="Login">
            </div>
            <div class="form-group">
                <img src="public/images/icones/ic-password.png" alt="ic-password">
                <input type="password" class="form-control bg-input" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="conn" class="btn btn-lg btn-primary">Connexion</button>
                <a href="/sa_quiz/pages/joueur/creer_joueur.php">S'inscrire pour jouer?</a>
            </div>
        </form>
    </div>
</div>


<?php include_once 'footer.php'; ?>
