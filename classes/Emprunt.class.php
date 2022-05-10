<?php 
    require_once('../incs/connexion.php');
    require_once('../incs/chargerClasse.php');
    
    class Emprunt{
        public $_id_emprunt;
        public $_id_membre;
        public $_id_livre;
        public $_date_emprunt;
        public $_statut;
        public $_date_remise;

        public function __construct($id,$id_m,$id_l,$date1,$status,$date2)
        {
            $this->setId_emprunt($id);
            $this->setId_membre($id_m);
            $this->setId_livre($id_l);
            $this->setDate_emprunt($date1);
            $this->setStatut($status);
            $this->setDate_remise($date2);
        }
       
        public function getId_emprunt()
        {
                return $this->_id_emprunt;
        }

        public function setId_emprunt($_id_emprunt)
        {
                $this->_id_emprunt = $_id_emprunt;

                return $this;
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
      
        public function getId_livre()
        {
                return $this->_id_livre;
        }
        
        public function setId_livre($_id_livre)
        {
                $this->_id_livre = $_id_livre;

                return $this;
        }
       
        public function getDate_emprunt()
        {
                return $this->_date_emprunt;
        }
         
        public function setDate_emprunt($_date_emprunt)
        {
                $this->_date_emprunt = $_date_emprunt;

                return $this;
        }
      
        public function getStatut()
        {
                return $this->_statut;
        }
        
        public function setStatut($_statut)
        {
                $this->_statut = $_statut;

                return $this;
        }

        public function getDate_remise()
        {
                return $this->_date_remise;
        }
         
        public function setDate_remise($_date_remise)
        {
                $this->_date_remise = $_date_remise;

                return $this;
        }

        public static function get_emprunt($id){
                $dbh = dbconnect();

                $sql = "SELECT * FROM emprunt WHERE id_emprunt = '%d'";
                $sql = sprintf($sql, $id);
                $resultats = $dbh -> query($sql);
                while($row = $resultats-> fetch()){
                        $emprunt = new Emprunt($row->id_emprunt,$row->id_membre,$row->id_livre,$row->date_emprunt,$row->statut,$row->date_remise);
                }
                $resultats -> closeCursor();
                return $emprunt;
        }

        public static function get_emprunts(){
                $dbh = dbconnect();
                $emprunts = array();

                $sql = "SELECT * FROM emprunt JOIN membre ON emprunt.id_membre=membre.id_membre WHERE statut=FALSE";
                $resultats = $dbh -> query($sql);
                while($row = $resultats-> fetch()){
                        $nom_membre= $row->nom_membre;
                        $titre = $row->intitule_livre;
                        $date_emprunt = $row->date_emprunt;           
                        $emprunts[] = new Emprunt($row->id_emprunt,$row->id_membre,$row->id_livre,$row->date_emprunt,$row->statut,$row->date_remise);
                }
                $resultats -> closeCursor();
                return $emprunts;
        }

        public static function get_emprunts_rendus(){
                $dbh = dbconnect();
                $emprunts = array();

                $sql = "SELECT * FROM emprunt WHERE statut=TRUE";
                $resultats = $dbh -> query($sql);
                while($row = $resultats-> fetch()){
                        $emprunts[] = new Emprunt($row->id_emprunt,$row->id_membre,$row->id_livre,$row->date_emprunt,$row->statut,$row->date_remise);
                }
                $resultats -> closeCursor();
                return $emprunts;
        }

        public static function set_emprunt($id_m,$id_l){
                $dbh = dbconnect();

                $sql = "INSERT INTO emprunt VALUES('0','%d','%d',CURDATE(),FALSE,null)";
                $sql = sprintf($sql, $id_m,$id_l);
                $dbh -> exec($sql);
        }

        public static function rendre_emprunt($id){
                $dbh = dbconnect();

                $sql = "UPDATE emprunt SET statut=TRUE, date_remise=CURDATE() WHERE id_emprunt='%d'";
                $sql = sprintf($sql, $id);
                $dbh -> exec($sql);
        }
    }
?>