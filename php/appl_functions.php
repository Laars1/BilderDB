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

function bilder(){
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

function profil(){
    
}

function logout(){
    session_destroy();
    redirect("registration");
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
            if (password_verify($_POST['password'], $pw[0]['Passwort'])) {
                $_SESSION['loggedIn'] = True;
                $_SESSION['username'] = $_POST['ben'];
                redirect("bilder");
                
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