<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Competencia.php';

	class CompeticionC
	{
		private static $_usuario;
		
		public function __construct()
		{
			self::$_usuario = new Usuario;
		}

		public static function Competencia($competencia)
		{
			return Competencia::getCompetencia($competencia);
		}

		public static function InfoCompetencia($id)
		{
			return Competencia::getInfoCompetencia($id);
		}

		public static function ConsultarDatosUsuario($id)
		{
			$usuario = new Usuario;

			return $usuario->getConsultarDatosUsuario($id);
		}

		public function TitularesCategoria($categoria)
		{
			$limit = 2;

			$noticia = new Noticia;

			return $noticia->getTitularesCategoria($categoria, $limit);
		}
	}
?>