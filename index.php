<?php



$ruta="docs";

$directorio = opendir($ruta); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
   if (is_dir($archivo))//verificamos si es o no un directorio
   {
        echo "[".$archivo . "]<br/>"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
    	if(file_exists ( "docs/".$archivo ))
    	{
    		echo "Procesado ".$archivo . "<br>";
    		$filename= $archivo;
//    	move_uploaded_file("docs/".$archivo,'Procesados/'.$filename);
    		rename ("docs/".$archivo,"Procesados/".$archivo);
    		$json = XMLtoJSON('Procesados/'.$filename);
    		$facEnviar = json_decode($json, true);

    		guardarEncabezado($facEnviar,substr($filename, 0, 2));
    	}
    	
    }
}


function XMLtoJSON($xml) {
	$xml_cnt = file_get_contents($xml);
	$xml_cnt = str_replace(array("\n", "\r", "\t"), '', $xml_cnt);
	$xml_cnt = trim(str_replace('"', "'", $xml_cnt));
	$simpleXml = simplexml_load_string($xml_cnt);
	return json_encode($simpleXml); 
}


function guardarEncabezado($facEnviar,$TipoDocumento){
	encabezado($facEnviar,$TipoDocumento);
}

function encabezado($matriz,$TipoDocumento){
	$a = array();
	$a["TipoDocumentoElectronico"] = $TipoDocumento;
	foreach($matriz as $key=>$value){
		if (is_array($value)){
			foreach($value as $key2=>$value2){
				if (is_array($value2)){
					foreach($value2 as $key3=>$value3){
						if (is_array($value3)){
						}else{  
							if ($key <> 'InformacionReferencia'){
								$a[$key3] = $value3;
								if($key=="Emisor"){
									$a["Emisor".$key2.$key3] = $value3;
								}
							}
						}
					}
				}else{  
					if ($key <> 'InformacionReferencia'){
						if($key=="Receptor"){
							$a["Receptor".$key2] = $value2;
						}else{
							if($key=="Emisor"){
								$a["Emisor".$key2] = $value2;
							}else{
								$a[$key2] = $value2;
							}
						}
					}
				}
			}
		}else{  
			$a[$key] = $value;
		}
	}
	//print_r($a);
	require_once("global.php");
	require_once(__CTR_PATH . "ctr_inicio.php");
	$ctr_inicio = new ctr_inicio();
	$ctr = $ctr_inicio->obtenerschema(TABLAENCABEZADO);
	$srtSQLVALUES="";
	$srtSQLCOLUMNS=""; 
	foreach ($ctr as $valor) {
		if(isset($a[$valor[0]])){
			if($valor[1]=="money"){
				$srtSQLVALUES.= str_replace("'","",$a[$valor[0]]).",";
				$srtSQLCOLUMNS.=$valor[0].","; 
			}else{
				$srtSQLVALUES.="'". str_replace("'","",$a[$valor[0]])."',";
				$srtSQLCOLUMNS.=$valor[0].","; 
			}

		}
	}

	$strSQL = "insert into ".TABLAENCABEZADO." (".substr($srtSQLCOLUMNS, 0, -1).") values (".substr($srtSQLVALUES, 0, -1).")";
	//echo $strSQL;
	$ctr_inicio->ejecutar($strSQL);
	
	guardarDetalle($matriz,$TipoDocumento,$a["NumeroConsecutivo"],$a["Clave"]);
} 


function guardarDetalle($arreglo,$TipoDocumento,$NumeroConsecutivo,$Clave)
{
	DETALLEFAC($arreglo["DetalleServicio"]["LineaDetalle"],$TipoDocumento,$NumeroConsecutivo,$Clave);
}

function DETALLEFAC($matriz,$TipoDocumento,$NumeroConsecutivo,$Clave){
	foreach($matriz as $key=>$value){
		if (is_array($value)){
			DETALLEFAC($value,$TipoDocumento,$NumeroConsecutivo,$Clave);
		}else{  
			if($key=="NumeroLinea"){
				recorro($matriz,$TipoDocumento,$NumeroConsecutivo,$Clave);
			}
		}
	}
} 
function recorro($matriz,$TipoDocumento,$NumeroConsecutivo,$Clave){
	$a = array();
	$a["TipoDocumentoElectronico"] = $TipoDocumento;
	$a["Clave"] = $Clave;
	$a["NumeroConsecutivo"]=$NumeroConsecutivo;
	$srtSQLVALUES="";
	$srtSQLCOLUMNS=""; 
	foreach($matriz as $key=>$value){
		if (is_array($value)){
			foreach($value as $key2=>$value2){
				if (is_array($value2)){
					foreach($value2 as $key3=>$value3){
						if (is_array($value3)){

						}else{  
							$a[$key2.$key3]=$value3;
						} 
					}
				}else{  
					$a[$key.$key2]=$value2;
				} 
			}
		}else{  
			$a[$key]=$value;
		} 
	}
	require_once("global.php");
	require_once(__CTR_PATH . "ctr_inicio.php");
	$ctr_inicio = new ctr_inicio();
	$ctr = $ctr_inicio->obtenerschemaDetalle(TABLADETALLE);
	$srtSQLVALUES="";
	$srtSQLCOLUMNS=""; 
	foreach ($ctr as $valor) {
		if(isset($a[$valor[0]])){
			if($valor[1]=="money"){
				$srtSQLVALUES.= str_replace("'","",$a[$valor[0]]).",";
				$srtSQLCOLUMNS.=$valor[0].","; 
			}else{
				$srtSQLVALUES.="'". str_replace("'","",$a[$valor[0]])."',";
				$srtSQLCOLUMNS.=$valor[0].","; 
			}

		}
	}
	$srtSQL = "insert into  ".TABLADETALLE." (".substr($srtSQLCOLUMNS, 0, -1).") values (".substr($srtSQLVALUES, 0, -1).")";
	//echo $srtSQL;
	$ctr_inicio->ejecutar($srtSQL);
} 

?>
<form method='post' action='index.php' enctype='multipart/form-data'>
	<input type="file" name="file[]" id="file" multiple>
	<input type='submit' name='submit' value='Upload'>
</form>