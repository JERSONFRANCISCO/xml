<?php
recorro();

function recorro(){
	require_once("global.php");
	require_once(__CTR_PATH . "ctr_inicio.php");
	$ctr_inicio = new ctr_inicio();
	$ctr = $ctr_inicio->obtenerDocsAcrear();
	foreach ($ctr as $valor) {
		echo $valor[0];
		creo_archivo('docs/'.$valor[0],$valor[1]);
		echo "<br/>";
	}
} 
function creo_archivo($nombre,$datos)
{
	if(file_exists($nombre)){$mensaje = "El Archivo $nombre se ha modificado";}
	else{$mensaje = "El Archivo $nombre se ha creado";}

	if($archivo = fopen($nombre, "a"))
	{
		$datos = substr($datos,0,-1);
		if(fwrite($archivo, $datos)){echo "Se ha ejecutado correctamente";}
		else{echo "Ha habido un problema al crear el archivo";}
		fclose($archivo);
	}
}

?>
