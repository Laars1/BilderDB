<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2018
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */


function db_insert_Users($params) {
    $sql = "insert into Users (Benutzername, Email, Passwort)
            values ('".escapeSpecialChars($params['benutzername'])."','".escapeSpecialChars($params['email'])."',
					'".escapeSpecialChars($params['passwort'])."')";
    sqlQuery($sql);
}

function db_select_User($params) {
    $sql = "select *
			from kontakte 
			where Benutzername ='".escapeSpecialChars($params['benutzername'])."';";
    return sqlSelect($sql);
}

?>