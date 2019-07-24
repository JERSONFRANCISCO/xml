<?php
class mdl_Conexion
{
	private $servidor;
	private $connectionInfo;
	private $conexion;
	private $resultado;

	function __construct()
	{
		$this->servidor = "Dialcomsv02,3341";
		//$this->servidor = 'LAPTOP-PUKMO5EA\SQLEXPRESS';
		$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"sa","PWD"=>'$abi@',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"dialcomtickets","UID"=>"jerson","PWD"=>'Jfhj3030_',"CharacterSet"=>"UTF-8");
		$this->conectar_base_datos();

	}

	private function conectar_base_datos()
	{
		$this->conexion = sqlsrv_connect($this->servidor,$this->connectionInfo);
		return $this->conexion;
	}

	public function ejecutar($consulta){
		$stmt = sqlsrv_query($this->conexion, $consulta);
		return $stmt;
	}
	public function valor($consulta){
		$stmt= sqlsrv_fetch($consulta);
		return $stmt;
	}
	public function consulta($consulta)
	{

		$stmt = sqlsrv_query($this->conexion, $consulta);

		if( $stmt === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "message: ".$consulta."<br />";
				}
			}
		}else{

		}

		return $stmt;
	}

	public function cerrar_BD ()
	{
		sqlsrv_close( $this->conexion);
	}

	public function obtener_Columnas($stmt){
		$stmt=sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
		return $stmt;
	}
	public function tiene_Registros($stmt){
		if ($stmt !== NULL) {  
			$rows = sqlsrv_has_rows( $stmt );  
			if ($rows === true)  {
				
				return true;
			}
			else   {
				return false; 
			}
		} 
		
	}
}
?>
