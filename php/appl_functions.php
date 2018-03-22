<?php

/*
 * @autor Michael Abplanalp
 * @version März 2018
 * Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login()
{
    // Template abfüllen und Resultat zurückgeben
    loginClicked();
    
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration()
{
    registrationClicked();
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

function registrationClicked()
{
    if (array_key_exists("ben", $_POST)) {
        if (strlen($_POST['ben']) > 0 && $_POST['password'] == $_POST['password2']) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            db_insert_Users($_POST);
        } else {
            ?>
<script>alert("Error!");</script>
<?php
        }
    }
}

function loginClicked()
{
    if (array_key_exists("ben", $_POST)) {
        if (strlen($_POST['ben']) > 0 && strlen($_POST['password']) > 0) {
            $pw = db_select_User($_POST);
            var_dump($pw[0]['Passwort'], $_POST['password']);
            if (password_verify($_POST['password'], $pw[0]['Passwort'])) {
                ?>
<script>alert("JAAAAAAAAAAAAAAAA!");</script>
<?php
            } else {
                ?>
<script>alert("Benutzername oder Passwort falsch!");</script>
<?php
            }
        } else {
            ?>
<script>alert("Error!");</script>
<?php
        }
    }
}

?>