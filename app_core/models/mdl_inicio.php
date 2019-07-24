<?php
require_once 'mdl_conexion.php';


class mdl_inicio{

	private $conexion;
	

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	public function obtenerschema(){
		$posts=array();
		$cont=0;
		$sql = "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS  WHERE TABLE_NAME = N'FE_FAC_FACTURAS' ;";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtenerschemaDetalle(){
		$posts=array();
		$cont=0;
		$sql = "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS  WHERE TABLE_NAME = N'FE_FAC_DETALLE' ;";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function ejecutar($sql){
		$stmt = $this->conexion->consulta($sql);
		return "ok";
	}
}
?>	
