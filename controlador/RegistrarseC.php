<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Usuario.php';
	require '../modelo/Noticia.php';
	require '../modelo/Equipo.php';
	require '../core/DateHelper.php';

	class RegistrarseC
	{
		private static $_noticia;
		private static $_usuario;
		private static $_equipo;
		private static $_helper;
		
		public function __construct()
		{
			self::$_noticia = new Noticia;
			self::$_usuario = new Usuario;
			self::$_helper = new DateHelper;
			self::$_equipo = new Equipo;
		}

		public static function getListaEquipos()
		{
			$equipo = new Equipo;
			return $equipo->getEquipos();
		}
	}
?>