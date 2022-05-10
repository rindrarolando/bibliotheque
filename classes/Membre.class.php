<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    
    class Membre{
        public $_id_membre;
        public $_prenom_membre;
        public $_nom_membre;
        public $_email;
        public $_birthday_membre;
        public $_date_inscription;
        public $_statut_membre;

        public function __construct($id,$prenom,$nom,$mail,$birth,$date)
        {
            $this->setId_membre($id);
            $this->setPrenom_membre($prenom);
            $this->setNom_membre($nom);
            $this->setEmail($mail);
            $this->setBirthday_membre($birth);
            $this->setDate_inscription($date);
        }        
       
        public function getId_membre()
        {
                return $this->_id_membre;
        }
        
        public function setId_membre($_id_membre)
        {
                $this->_id_membre = $_id_membre;

                return $this;
        }
       
        public function getPrenom_membre()
        {
                return $this->_prenom_membre;
        }

        
        public function setPrenom_membre($_prenom_membre)
        {
                $this->_prenom_membre = $_prenom_membre;

                return $this;
        }
       
        public function getNom_membre()
        {
                return $this->_nom_membre;
        }
       
        public function setNom_membre($_nom_membre)
        {
                $this->_nom_membre = $_nom_membre;

                return $this;
        }
       
        public function getEmail()
        {
                return $this->_email;
        }
        
        public function setEmail($_email)
        {
                $this->_email = $_email;

                return $this;
        }
       
        public function getBirthday_membre()
        {
                return $this->_birthday_membre;
        }
       
        public function setBirthday_membre($_birthday_membre)
        {
                $this->_birthday_membre = $_birthday_membre;

                return $this;
        }
        
        public function getDate_inscription()
        {
                return $this->_date_inscription;
        }

        public function setDate_inscription($_date_inscription)
        {
                $this->_date_inscription = $_date_inscription;

                return $this;
        }
 
        public function getStatut_membre()
        {
                return $this->_statut_membre;
        }
        
        public function setStatut_membre($_statut_membre)
        {
                $this->_statut_membre = $_statut_membre;

                return $this;
        }

        public static function get_membre($id){
                $dbh = dbconnect();

                $sql= "SELECT * FROM membre WHERE id_membre='%d'";
                $sql = sprintf($sql, $id);
                $resultats = $dbh -> query($sql);
                $resultats -> setFetchMode(PDO::FETCH_OBJ);
                while ($row = $resultats->fetch()){
                        $membre = new Membre($row->id_membre,$row->prenom_membre,$row->nom_membre,$row->email,$row->birthday_membre,$row->date_inscription,$row->statut_membre);        
                }
                $resultats -> closeCursor();
                return $membre;
        }

        public static function get_membre_emprunt($prenom,$nom){
                $dbh = dbconnect();

                $sql= "SELECT * FROM membre WHERE prenom_membre='%s' AND nom_membre='%s'";
                $sql = sprintf($sql, $prenom, $nom);
                $resultats = $dbh -> query($sql);
                $resultats -> setFetchMode(PDO::FETCH_OBJ);
                while ($row = $resultats->fetch()){
                        $membre = new Membre($row->id_membre,$row->prenom_membre,$row->nom_membre,$row->email,$row->birthday_membre,$row->date_inscription,$row->statut_membre);        
                }
                $resultats -> closeCursor();
                return $membre;
        }

        public static function get_membres(){
                $dbh = dbconnect();
                $membres = array();

                $sql= "SELECT * FROM membre WHERE statut_membre=TRUE";
                $resultats = $dbh -> query($sql);
                $resultats -> setFetchMode(PDO::FETCH_OBJ);
                while ($row = $resultats->fetch()){
                        $membres[] = new Membre($row->id_membre,$row->prenom_membre,$row->nom_membre,$row->email,$row->birthday_membre,$row->date_inscription,$row->statut_membre);        
                }
                $resultats -> closeCursor();
                return $membres;
        }

        public static function get_anciens_membres(){
                $dbh = dbconnect();
                $membres = array();

                $sql= "SELECT * FROM membre WHERE statut_membre=FALSE";
                $resultats = $dbh -> query($sql);
                $resultats -> setFetchMode(PDO::FETCH_OBJ);
                while ($row = $resultats->fetch()){
                        $membres[] = new Membre($row->id_membre,$row->prenom_membre,$row->nom_membre,$row->email,$row->birthday_membre,$row->date_inscription,$row->statut_membre);        
                }
                $resultats -> closeCursor();
                return $membres;
        }

        public static function ajouter_membre($prenom,$nom,$mail,$birthday){
                $dbh = dbconnect();
                
                $sql = "INSERT INTO membre VALUES('0','%s','%s','%s','%s',CURDATE(),TRUE)";
                $sql = sprintf($sql, $prenom, $nom, $mail, $birthday);
                $dbh -> exec($sql);
        }

        public static function retirer_membre($id){
                $dbh = dbconnect();
                $membre = Membre::get_membre($id);
                $sql= "UPDATE membre SET statut_membre = FALSE WHERE id_membre='%d'";
                $sql = sprintf($sql, $membre->getId_membre());
                $dbh -> exec($sql);

        }

        public static function search_membre($search){
                $dbh = dbconnect();
                $membres = array();

                $sql= "SELECT * FROM membre WHERE (nom_membre LIKE '%s' OR prenom_membre LIKE '%s' OR email LIKE '%s') AND statut_membre=TRUE";
                $sql = sprintf($sql , $search, $search , $search);
                $resultats = $dbh -> query($sql);
                $resultats -> setFetchMode(PDO::FETCH_OBJ);
                while ($row = $resultats->fetch()){
                        $membres[] = new Membre($row->id_membre,$row->prenom_membre,$row->nom_membre,$row->email,$row->birthday_membre,$row->date_inscription,$row->statut_membre);        
                }
                $resultats -> closeCursor();
                return $membres;
        }
        
    }
?>  