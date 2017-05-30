<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Usuario.php';
	require '../modelo/Noticia.php';
	require '../core/DateHelper.php';

	class IniciarSesionC
	{
		private static $_noticia;
		private static $_usuario;
		private static $_helper;
		
		public function __construct()
		{
			self::$_noticia = new Noticia;
			self::$_usuario = new Usuario;
			self::$_helper = new DateHelper;
		}

		public static function ConsultarDatosUsuario($id)
		{
			$usuario = new Usuario;

			return $usuario->getConsultarDatosUsuario($id);
		}
	}
?>