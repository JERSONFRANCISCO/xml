<?php
//echo "<style>table, th, td {border: 1px solid black;border-collapse: collapse;}th, td { padding: 15px;}</style>";
function XMLtoJSON($xml) {
  $xml_cnt = file_get_contents($xml);
  $xml_cnt = str_replace(array("\n", "\r", "\t"), '', $xml_cnt);
  $xml_cnt = trim(str_replace('"', "'", $xml_cnt));
  $simpleXml = simplexml_load_string($xml_cnt);
  return json_encode($simpleXml); 
}
$json = XMLtoJSON('4186.xml');
//echo $json;


$facEnviar = json_decode($json, true);

guardarEncabezado($facEnviar);
//guardarDetalle($facEnviar);




function guardarEncabezado($facEnviar){
  encabezado($facEnviar);
}
function encabezado($matriz){
  $a = array();

  foreach($matriz as $key=>$value){
    if (is_array($value)){
      foreach($value as $key2=>$value2){
        if (is_array($value2)){
          foreach($value2 as $key3=>$value3){
            if (is_array($value3)){
            }else{  
              $a[$key3] = $value3;
            }
          }
        }else{  
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
    }else{  
      $a[$key] = $value;
    }
  }
  print_r($a);
} 


function guardarDetalle($arreglo)
{
  DETALLEFAC($arreglo["DetalleServicio"]["LineaDetalle"]);
}

function DETALLEFAC($matriz){
  foreach($matriz as $key=>$value){
    if (is_array($value)){
      DETALLEFAC($value);
    }else{  
      if($key=="NumeroLinea"){
        echo '<br>';
        echo '<br>';
        //print_r($matriz);
        recorro($matriz);

      }
    }
  }
} 
function recorro($matriz){
  $enteros = array(
    "Cantidad"=>"S",
    "PrecioUnitario"=>"S",
    "MontoTotal"=>"S",
    "DescuentoMontoDescuento"=>"S",
    "SubTotal"=>"S",
    "ImpuestoTarifa"=>"S",
    "ImpuestoMonto"=>"S",
    "ImpuestoNeto"=>"S",
    "MontoTotalLinea"=>"S"
  );
  echo $srtSQLVALUES="";
  echo $srtSQLCOLUMNS=""; 
  foreach($matriz as $key=>$value){
    if (is_array($value)){
      foreach($value as $key2=>$value2){
        if (is_array($value2)){
        }else{  
          if(isset($enteros[$key.$key2])){
            if($enteros[$key.$key2]=="S"){
              $srtSQLCOLUMNS.=$key.$key2.",";
              $srtSQLVALUES.=$value2.",";
            }else{
              $srtSQLCOLUMNS.=$key.$key2.",";
              $srtSQLVALUES.="'".$value2."',";
            }
          }else{
            $srtSQLCOLUMNS.=$key.$key2.",";
            $srtSQLVALUES.="'".$value2."',";
          }
        } 
      }
    }else{  
      if(isset($enteros[$key])){
        if($enteros[$key]=="S"){
          $srtSQLCOLUMNS.=$key.",";
          $srtSQLVALUES.=$value.",";
        }else{
          $srtSQLCOLUMNS.=$key.",";
          $srtSQLVALUES.="'".$value."',";
        }
      }else{
        $srtSQLCOLUMNS.=$key.",";
        $srtSQLVALUES.="'".$value."',";
      }
    } 
  }
  echo "<br>";
  $srtSQL = "insert into  FE_FAC_DETALLE (".substr($srtSQLCOLUMNS, 0, -1).") values (".substr($srtSQLVALUES, 0, -1).")";
  echo $srtSQL;
} 

?>
