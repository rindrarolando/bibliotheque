<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');

    $id=$_GET['id'];
    $livre = Livre::get_book($id);

    $livre->retirer_livre();
    
    header('Location: ../pages/livre.php');
?>