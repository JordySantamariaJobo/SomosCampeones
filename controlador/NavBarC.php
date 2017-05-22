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
	}
?>