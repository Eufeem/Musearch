<?php
	require_once("../model/Bmuseos.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new museos();
		$r=$inst ->lista_museos($valor);
		//print_r($r);
		echo json_encode($r);
	}

?>
