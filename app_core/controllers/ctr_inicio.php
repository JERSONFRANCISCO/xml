<?php

require_once(__MDL_PATH . "mdl_inicio.php");
class ctr_inicio{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_inicio();
		}
		public function obtenerschema($TABLA)
		{
			return $this->postdata->obtenerschema($TABLA);
		}
		public function obtenerschemaDetalle($TABLA)
		{
			return $this->postdata->obtenerschemaDetalle($TABLA);
		}
		public function ejecutar($sql)
		{
			return $this->postdata->ejecutar($sql);
		}
		public function obtenerDocsAcrear()
		{
			return $this->postdata->obtenerDocsAcrear();
		}
	}
	?>