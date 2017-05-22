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

		public static function InfoCompetencia($competencia)
		{
			return self::$_competencia->getInfoCompetencia($competencia);
		}

		public static function ConsultarDatosUsuario($id)
		{
			return self::$_usuario->getConsultarDatosUsuario($id);
		}
	}
?>