<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');
    
    $id_m = $_GET['id_m'];
    $id_l = $_GET['id_l'];
   
    Emprunt::set_emprunt($id_m,$id_l);
    
    header('Location: ../pages/emprunt.php');
?>