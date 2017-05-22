<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require '../modelo/Noticia.php';
	require '../modelo/Usuario.php';
	require '../modelo/Partido.php';
	require '../modelo/Equipo.php';
	require '../modelo/Banner.php';
	require '../modelo/SoundCloud.php';
	require '../modelo/Helper.php';

	class NoticiaC
	{
		private static $_noticia;
		private static $_usuario;
		private static $_partido;
		private static $_equipo;
		private static $_banner;
		private static $_sound_cloud;
		private static $_helper;

		public function __construct()
		{
			self::$_noticia = new Noticia;
			self::$_usuario = new Usuario;
			self::$_partido = new Partido;
			self::$_equipo = new Equipo;
			self::$_banner = new Banner;
			self::$_sound_cloud = new SoundCloud;
			self::$_helper = new Helper;
		}

		public static function TitularesDelDia()
		{
			return self::$_noticia->getTitularesDelDia();
		}

		public static function ConsultarNoticia($id, $titulo)
		{
			return self::$_noticia->getNoticia($id, $titulo);
		}

		public static function Equipo($id)
		{
			return self::$_equipo->getInfoEquipo($id);
		}

		public static function ConsultarDatosUsuario($id)
		{
			return self::$_usuario->getConsultarDatosUsuario($id);
		}

		public static function NoticiasPrincipal()
		{
			return self::$_noticia->getTitularesDelDia();
		}

		public static function TeRecomendamos($idNoticia)
		{
			return self::$_noticia->getNoticiasRecomendadas($idNoticia);
		}

		public static function Partidos()
		{
			return self::$_partido->getPartidosEnJuego();
		}

		public static function Anuncio()
		{
			$num = rand(1,10);

			return self::$_banner->getAnuncio($num);
		}

		public static function SoundCloud()
		{
			return self::$_sound_cloud->getSoundCloud();
		}

		public static function NoticiaPanel()
		{
			return self::$_noticia->getNoticiasPanel();
		}

		public static function getFormatoFecha($fecha)
		{
			return self::$_helper->getFormatoFecha($fecha);
		}
	}
?>