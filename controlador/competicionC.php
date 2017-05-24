<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Competencia.php';

	class CompeticionC
	{
		private static $_competencia;
		private static $_usuario;
		
		public function __construct()
		{
			self::$_competencia = new Competencia;
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
			return self::$_usuario->getConsultarDatosUsuario($id);
		}
	}
?>