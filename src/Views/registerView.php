<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="/public/assets/css/sass/registerStylus.scss">
    <link rel="stylesheet" href="/public/assets/css/sass/registerStylus.css">

    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
</head>
<body>
<header>
    <div class="headerContainer">
        <?php require 'headerView.php';?>
    </div>
</header>
<div id="registerView">
    <div class="title">
        <h1>Inscription</h1>
    </div>
    <div class="formRegister">
        <form class="registerForm">
            <div class="itemBox itemBox__nameBox">
                <input type="text" class="name" placeholder="Nom">
            </div>
            <div class="itemBox itemBox__surnameBox">
                <input type="text" class="surname" placeholder="Prénom">
            </div>
            <div class="itemBox itemBox__pseudoBox">
                <input type="text" class="pseudo" placeholder="Pseudonyme">
            </div>
            <div class="itemBox itemBox__adressBox">
                <input type="text" class="adress" placeholder="Adresse(numéro de voirie, rue, etc.)">
            </div>
            <div class="itemBox itemBox__postCodeBox">
                <input type="text" class="postCode" placeholder="Code Postale">
            </div>
            <div class="itemBox itemBox__cityBox">
                <input type="text" class="city" placeholder="Ville">
            </div>
            <div class="itemBox itemBox__eMailBox">
                <input type="email" class="eMail" placeholder="E-mail">
            </div>
            <div class="itemBox itemBox__passwordBox">
                <input type="password" class="password" placeholder="Mot de passe">
            </div>
            <div class="itemBox itemBox__passwordVerifBox">
                <input type="password" class="passwordVerif" placeholder="Confirmation de votre mot de passe" >
            </div>
        </form>
    </div>
    <div class="title">
        <h2>Quelle Karotte êtes-vous ?</h2>
    </div>
    <div class="btnChoice">
        <input type="button" class="prod" value="Productrice">
        <input type="button" class="citoyen" value="Citoyenne">
    </div>
    <div class="cguBox">
        <div class="checkBox">
            <input type="checkbox" class="check">
        </div>
        <div class="para">
            <p class="msg">J'ai lu et j'accepte les <a href="/">conditions générales d'utilisation</a>.</p>
        </div>
    </div>
    <div class="join">
        <input type="button" class="btnJoin" value="Rejoindre la botte">
    </div>
</div>
</body>
</html>
