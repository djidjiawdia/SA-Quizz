<?php 
    include_once '../../header.php'; 

    if(isset($_POST['creerCompte'])){
        die(var_dump($_POST, $_FILES));
    }
?>

<?php
    $nameAvatar = "Avatar du joueur";
    $title = "Pour tester votre niveau de culture générale";
    include_once '../inscription.php';
?>

<?php include_once '../../footer.php'; ?>