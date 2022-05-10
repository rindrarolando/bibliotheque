<?php
	function chargerClasse($classe){
		require '../classes/'.$classe.'.class.php';
	}
	spl_autoload_register('chargerClasse');
?>