<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');

    class Livre {
        public $_id_livre;
        public $_id_categorie;
        public $_intitule_livre;
        public $_auteur_livre;
        public $_nb_page;
        public $_photo;

        public function __construct($id,$id_cat,$titre,$aut,$nb,$photo)
        {
            $this->setId_livre($id);
            $this->setId_categorie($id_cat);
            $this->setIntitule_livre($titre);
            $this->setAuteur_livre($aut);
            $this->setNb_page($nb);  
            $this->setPhoto($photo);         
        }

        public function setId_livre($id){
            $this->_id_livre = $id;
        }

        public function getId_livre(){
            return $this->_id_livre;
        }

        public function setId_categorie($id_cat){
            $this->_id_categorie = $id_cat;
        }

        public function getId_categorie(){
            return $this->_id_categorie;
        }

        public function setIntitule_livre($titre){
            $this->_intitule_livre = $titre;
        }

        public function getIntitule_livre(){
            return $this->_intitule_livre;
        }

        public function setAuteur_livre($aut){
            $this->_auteur_livre = $aut;
        }

        public function getAuteur_livre(){
            return $this->_auteur_livre;
        }

        public function setNb_page($nb){
            $this->_nb_page = $nb;
        }

        public function getNb_page(){
            return $this->_nb_page;
        }

        public function getPhoto()
        {
                return $this->_photo;
        }

        public function setPhoto($_photo)
        {
                $this->_photo = $_photo;

                return $this;
        }

        public static function get_book($id_book){
            $dbh = dbconnect();

            $sql = "SELECT * FROM livre WHERE id_livre='%d'";
            $sql = sprintf($sql, $id_book);
            $resultats = $dbh->query($sql);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $resultats->fetch()){
                $book = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats->closeCursor();
            return $book;
        }

        public static function get_book_emprunt($titre){
            $dbh = dbconnect();

            $sql = "SELECT * FROM livre WHERE intitule_livre='%s'";
            $sql = sprintf($sql, $titre);
            $resultats = $dbh->query($sql);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $resultats->fetch()){
                $book = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats->closeCursor();
            return $book;
        }

        public static function get_all_books(){
            $dbh = dbconnect();
            $livres = array();

            $sql ="SELECT * FROM livre";
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $livres[] = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats -> closeCursor();
            return $livres;
        }

        public static function get_books_categorie($i){
            $dbh = dbconnect();
            $livres = array();

            $sql ="SELECT * FROM livre WHERE id_categorie='%d'";
            $sql = sprintf($sql, $i);
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $livres[] = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats -> closeCursor();
            return $livres;
        }

        public static function get_books_emprunté(){
            $dbh = dbconnect();
            $livres = array();

            $sql ="SELECT * FROM livre WHERE id_livre IN (SELECT * FROM emprunt WHERE statut=FALSE)";
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $livres[] = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats -> closeCursor();
            return $livres;
        }

        public static function ajouter_livre($id_cat,$titre,$aut,$page,$photo){
            $dbh = dbconnect();
            
            $sql = "INSERT INTO livre VALUES('0','%d','%s','%s','%d','%s')";
            $sql = sprintf($sql, $id_cat,$titre,$aut,$page,$photo);
            $dbh -> exec($sql);
        }

        public function retirer_livre(){
            $dbh = dbconnect();

            $sql = "DELETE FROM livre WHERE id_livre='%d'";
            $sql = sprintf($sql, $this->getId_livre());
            $dbh -> exec($sql);
        }

        public static function search_book($search){
            $dbh = dbconnect();
            $livres = array();

            $sql ="SELECT * FROM livre WHERE intitule_livre LIKE '%s' OR auteur_livre LIKE '%s'";
            $sql = sprintf($sql, $search, $search);
            $resultats = $dbh -> query($sql);
            $resultats -> setFetchMode(PDO::FETCH_OBJ);
            while($row = $resultats->fetch()){
                $livres[] = new Livre($row->id_livre,$row->id_categorie,$row->intitule_livre,$row->auteur_livre,$row->nb_page,$row->photo);
            }
            $resultats -> closeCursor();
            return $livres;
        }

    }
?>