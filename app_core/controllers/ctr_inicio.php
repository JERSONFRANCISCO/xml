<?php

require_once(__MDL_PATH . "mdl_inicio.php");
class ctr_inicio{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_inicio();
		}
		public function obtenerschema()
		{
			return $this->postdata->obtenerschema();
		}
		public function obtenerschemaDetalle()
		{
			return $this->postdata->obtenerschemaDetalle();
		}
		public function ejecutar($sql)
		{
			return $this->postdata->ejecutar($sql);
		}
		
	}
	?>