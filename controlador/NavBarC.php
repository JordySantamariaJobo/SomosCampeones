<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	class NavBarC
	{
		private static $_noticia;

		public function __construct()
		{
			self::$_noticia = new Noticia;
		}

		public function TitularNav($competencia)
		{
			return self::$_noticia->getNoticiaTitularNav($competencia);
		}

		public function NoticiasNav($competencia)
		{
			return self::$_noticia->getNoticiasNav($competencia);
		}

		public function TitularesDelDia()
		{
			return self::$_noticia->getTitularesDelDia();
		}

		public function MensajeSesion()
		{
			$random = rand(0,2);

    		switch ($random)
    		{
    			case 0: $mensaje = "QUE DORSAL LLEVARA TU CAMISETA?"; break;
    			case 1: $mensaje = "VAMOS!, LA AFICION TE ESPERA!"; break;
    			case 2: $mensaje = "CUANTOS GOLES PLANEAS METER HOY?"; break;
			}

			return $mensaje;
		}
	}
?>