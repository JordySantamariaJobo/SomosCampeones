<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Competencia.php';
	require '../modelo/Usuario.php';

	class competicionC
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
			return self::$_competencia->getCompetencia($competencia);
		}
	}
?>