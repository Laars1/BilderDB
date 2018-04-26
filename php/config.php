<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her
 */

// Funktionen

    setValue("cfg_func_member_list", array("forumsthemen","thema" ,"beitrag_add" ,"logout"));
    // Inhalt des Menus
    setValue("cfg_menu_member_list", array("forumsthemen"=>"Forumsthemen","thema"=>"Thema bearbeiten","beitrag_add"=>"Beitrag erstellen", "logout"=>"Logout"));

    setValue("cfg_func_list", array("login","registration"));
    // Inhalt des Menus
    setValue("cfg_menu_list", array("login"=>"Login","registration"=>"Registration"));



// Datenbankverbindung herstellen
$db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "bilderdb");
if (!$db) die("Verbindungsfehler: ".mysqli_connect_error());
setValue("cfg_db", $db);
?>
