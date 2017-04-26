<?php
	/**
	* Constructor de competicion.php
	*/
	class competicionC
	{
		public $competicion;
		
		public function __construct($competicion)
		{
			$this->competicion = $competicion;
		}

		public function tituloHeader()
		{
			return $this->competicion;
		}

		public function titulo()
		{
			return $this->competicion;
		}
	}
?>