<?php

  // variables del host
  //$myhost="localhost";
 // $myproject="Cotizaciones";
  $myhost="//localhost";
  $myproject="SistemaVersion1_0_0";
  $mysite=$myhost . "/" . $myproject;


  date_default_timezone_set('America/Costa_Rica');


  define('__ROOT__', $_SERVER["DOCUMENT_ROOT"]); 
  define('__SITE_PATH', $mysite);
  define('__MDL_PATH', "app_core/models/");
  define('__CTR_PATH', "app_core/controllers/");
  define('__VWS_PATH',  "app_core/views/");

  define('__VWS_PATH2', $myproject . "/app_core/views/");

  define('__VWSComun_PATH3', $myproject . "/app_core/views/UsoComun/");

  define('__VWS_HOST_PATH', $mysite . "/app_core/views/");
  define('__CTR_HOST_PATH', $mysite . "/app_core/controllers/");

  define('__RSC_PATH', __ROOT__ . "/app_core/resources/");
  define('__RSC_HOST_PATH', $mysite . "/app_core/resources/");

  define('__RSC_PHO_HOST_PATH', $mysite . "/app_core/resources/img/");
  define('__RSC_PHO_USR_HOST_PATH', $mysite . "/app_core/resources/usrimg/");

  define('__APP_DSG', $mysite . "/app_design/");
  define('__JS_PATH', "app_design/js/");
  define('__CSS_PATH', $mysite . "/app_design/css/");
  define('__IMG_PATH', $mysite . "/app_design/img/");   

  define('__BOOSTRAP',"app_design/bootstrap/");
  define('__FONT', "app_design/font-awesome/");

  define('__google_fonts', "https://fonts.googleapis.com/css");   
//app_core/resources/usrimg/
 


  define('TABLADETALLE', "FE_FAC_DETALLE");
  define('TABLAENCABEZADO',  "FE_FAC_FACTURAS");


?>