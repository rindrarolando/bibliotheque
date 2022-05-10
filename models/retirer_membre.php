<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');
    $dbh = dbconnect();

    $id = $_GET['id'];

    Membre::retirer_membre($id);

    header('Location: ../pages/membre.php');
?>