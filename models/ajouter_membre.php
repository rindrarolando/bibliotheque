<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');
    
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    $mail = $_GET['email'];
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $jour = $_GET['jour'];
    $birth = date($annee."-".$mois."-".$jour);
    
    Membre::ajouter_membre($prenom,$nom,$mail,$birth);

    header('Location: ../pages/membre.php');
?>