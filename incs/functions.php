<?php 
    function check_mail($mail){
        $dbh = dbconnect();
        $rep = false;
        $sql = "SELECT * FROM membre WHERE email='%s'";
        $sql = sprintf($sql, $mail);
        $resultats = $dbh -> query($sql);
        if($resultats ->fetch()){
            $rep = true;
            return $rep;
        }else{
            return $rep;
        }    
    }
?>