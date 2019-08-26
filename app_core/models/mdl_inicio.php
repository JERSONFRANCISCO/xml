<?php
require_once 'mdl_conexion.php';


class mdl_inicio{

	private $conexion;
	

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	public function obtenerschema($TABLA){
		$posts=array();
		$cont=0;
		$sql = "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS  WHERE TABLE_NAME = N'".$TABLA."' ;";

		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtenerschemaDetalle($TABLA){
		$posts=array();
		$cont=0;
		$sql = "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS  WHERE TABLE_NAME = N'".$TABLA."' ;";
		
		$stmt = $this->conexion->consulta($sql);

		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
	//	print_r($posts);
		return $posts;
	}

	public function ejecutar($sql){
		$stmt = $this->conexion->consulta($sql);
		return "ok";
	}

	public function obtenerDocsAcrear(){
		$posts=array();
		$cont=0;
		$sql = "select  COM_TipoDocumento+'-'+COM_Clave+'.xml'as NombreArchivo, REPLACE(convert(varchar(max),COM_ArchivoXMLEnvio), 'ï»¿', '')
		from fe.FE_COMPROBANTES_ELECTRONICOS where COM_ArchivoXMLEnvio is not null and   (id between 68302 and 68418)  and COM_Clave  in (
'50626081900310108814000100001040000000844100803793',
'50626081900310108814000100001010000015660100803000',
'50626081900310108814000100001010000015661100802998',
'50626081900310108814000100001010000015662100802996',
'50626081900310108814000100010010000015316100803794',
'50626081900310108814000100007010000002792100803795',
'50626081900310108814000100001010000015663100802995',
'50626081900310108814000100001010000015664100803002',
'50626081900310108814000100001010000015665100803008',
'50626081900310108814000100001010000015666100803013',
'50626081900310108814000100001010000015667100803022',
'50626081900310108814000100009010000000475100803798'
)"; 
echo $sql;
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas2($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			//echo "Nombre procesando:".$row[0]."<br/>";16129
			$cont++;
		}
		return $posts;
	}
}
// todo mayor a  64855  no se ha creado
// adobe   (id between 68418 and 68418)  ";
// rahso   (id between 16129 and 16129)  ";
?>	
