<?php
class mdl_Conexion
{
	private $servidor;
	private $connectionInfo;
	private $conexion;
	private $resultado;

	function __construct()
	{
		
		//$this->servidor = '.';
		//$this->servidor = '172.17.35.2,3341';
		//$this->servidor = 'Dialcomsv02,3341';
		//$this->connectionInfo =array("Database"=>"SabioAlco","UID"=>"sa","PWD"=>'$abi@',"CharacterSet"=>"UTF-8");
		//$this->servidor = ".";
		$this->servidor = "192.169.1.15";
		//$this->servidor = "26.22.81.33";

		//$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"sa","PWD"=>'123456',"CharacterSet"=>"UTF-8");
        $this->connectionInfo =array("Database"=>"SabioAdobe","UID"=>"sa","PWD"=>'Password01',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"sa","PWD"=>'Password01',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"dialcomtickets","UID"=>"jerson","PWD"=>'Jfhj3030_',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"Sa","PWD"=>' $abi@',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"Sabio","UID"=>"Sa","PWD"=>'$qlRahso1357',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"Sa","PWD"=>'$qlRahso1357',"CharacterSet"=>"UTF-8");
		//$this->connectionInfo =array("Database"=>"SabioXML","UID"=>"sa","PWD"=>'Jfhj3030_',"CharacterSet"=>"UTF-8");
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
	public function obtener_Columnas2($stmt){
		$stmt=sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
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
