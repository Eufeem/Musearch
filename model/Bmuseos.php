<?php
	class museos
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function lista_museos($valor)
		{
			$sql="SELECT * FROM museo WHERE nombre_museo like '%".$valor."%' or descripcion_museo like '%".$valor."%' or colonia_museo like '%".$valor."%'";
			$this->conexion->conexion->set_charset('utf-8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}
	}

?>
