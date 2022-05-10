<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    require_once('../incs/functions.php');

    $nc = $_GET['nom_cat'];
    $cat = Categorie::get_categorie($nc);
    $id_cat = $cat->getId_categorie();
    $titre = $_GET['intitule'];
    $auteur = $_GET['auteur'];
    $nb_page = $_GET['pages'];
    $photo = "../images/".$_GET['photo'];


    Livre::ajouter_livre($id_cat,$titre,$auteur,$nb_page,$photo);

    header('Location: ../pages/livre.php');
?>