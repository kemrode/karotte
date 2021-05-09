<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="./sass/registerStyle.css">
</head>
<body>
<div class="primaryContainer primaryContainer__backgroundColor">
    <div class="headerContainer">
        <?php require 'headerView.php';?>
    </div>
    <div class="registerContainer registerContainer__backgroundColor">
        <div class="registerTitleBox registerTitleBox__font">
            <div class="registerTitle">
                <h2>Inscription</h2>
            </div>
        </div>
        <div class="formContainer">
            <div class="itemsFormContainer">
                <form method="post" action="" name="itemForm">
                    <div class="itemsListBox">
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemName" placeholder="Nom">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemSurname" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemPseudo" placeholder="Pseudonyme">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemAdress" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemPostCode" placeholder="Code Postal">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemCity" placeholder="Ville">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="email" name="itemMail" placeholder="e-mail">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="password" name="itemPasswrd" placeholder="Mot de Passe">
                            </div>
                        </div>
                        <div class="itemBox">
                            <div class="item">
                                <input type="text" name="itemPasswrdVerif" placeholder="Mot de Passe">
                            </div>
                        </div>
                    </div>
                    <div class="subtitleRegisterBox">
                        <div class="subtitleRegister">
                            <h5>Quelle karotte êtes-vous ?</h5>
                        </div>
                    </div>
                    <div class="choicesListBox">
                        <div class="choiceBox">
                            <button name="prodKarotte">Productrice</button>
                        </div>
                        <div class="choiceBox">
                            <button name="citoyKarotte">Citoyenne</button>
                        </div>
                    </div>
                    <div class="cguBox">
                        <div class="checkBoxContainer">
                            <input type="checkbox" name="checkCGU">
                        </div>
                        <div class="labelCheckboxContainer">
                            <div class="labelBox">
                                <p>J'ai lu et accepte les conditions générales d'utilisation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="buttonBox">
                        <input type="submit" name="joinUpBtn" value="Rejoindre la botte">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
</body>