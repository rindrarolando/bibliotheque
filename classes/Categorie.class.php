<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');

    class Categorie{
        public $_id_categorie;
        public $_nom_categorie;

        public function __construct($id , $nom)
        {
            $this->setId_categorie($id);
            $this->setNom_categorie($nom);
        }

        public function setId_categorie($id){
            $this->_id_categorie = $id;
        }

        public function getId_categorie(){
            return $this->_id_categorie;
        }

        public function setNom_categorie($nom){
            $this->_nom_categorie= $nom;
        }

        public function getNom_categorie(){
            return $this->_nom_categorie;
        }

        public static function get_categorie($cat){
            $dbh = dbconnect();
            
            $sql ="SELECT * FROM categorie WHERE nom_categorie='%s'";
            $sql = sprintf($sql, $cat);
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $categorie = new Categorie($row->id_categorie,$row->nom_categorie);
            }
            $resultats -> closeCursor();
            return $categorie;
        }

        public static function get_all_categories(){
            $dbh = dbconnect();
            $categories = array();

            $sql="SELECT * FROM categorie";
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $categories[] = new Categorie($row->id_categorie,$row->nom_categorie);
            }
            $resultats -> closeCursor();
            return $categories;
        }
    }
?>