<?php
function dbconnect()
{
    static $dbh = null;
	static $user="root";
    static $pass="root";
    static $dsn="mysql:host=localhost;dbname=bibliotheque";
    if ($dbh === null) {
		try{
			$dbh = new PDO($dsn, $user, $pass);
		} catch (PDOException $e) {
        	print "Erreur ! : " . $e->getMessage();
        	die();
        }
    }
    return $dbh;
}

?>