<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');

    $id_emprunt = $_GET['id_emprunt'];
    Emprunt::rendre_emprunt($id_emprunt);

    header('Location: ../pages/emprunt.php');
?>