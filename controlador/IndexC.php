<?php
	/**
	* Created by JordySantamaria
	* Mail: jordysantamaria@hotmail.com
	*/

	require 'modelo/Usuario.php';
	require 'modelo/Noticia.php';
	require 'modelo/Partido.php';
	require 'modelo/Banner.php';
	require 'modelo/SoundCloud.php';
	require 'modelo/Equipo.php';
	require 'modelo/PostMinuto.php';
	require 'core/DateHelper.php';

	class IndexC
	{
		const LIMIT_NOTICIAS = 3;

		private static $_noticia;
		private static $_usuario;
		private static $_partido;
		private static $_banner;
		private static $_sound_cloud;
		private static $_equipo;
		private static $_post_minuto;
		private static $_helper;

		public function __construct()
		{
			self::$_noticia = new Noticia;
			self::$_usuario = new Usuario;
			self::$_partido = new Partido;
			self::$_banner = new Banner;
			self::$_sound_cloud = new SoundCloud;
			self::$_equipo = new Equipo;
			self::$_post_minuto = new PostMinuto;
			self::$_helper = new DateHelper;
		}

		public function TitularNav($competencia)
		{
			return self::$_noticia->getNoticiaTitularNav($competencia);
		}

		public function NoticiasNav($competencia)
		{
			return self::$_noticia->getNoticiasNav($competencia);
		}

		public static function NoticiaJumbotron()
		{
			return self::$_noticia->getNoticiaJumbotron();
		}

		public static function TitularesDelDia()
		{
			return self::$_noticia->getTitularesDelDia();
		}

		public static function TitularesCategoria($categoria, $limit)
		{
			return self::$_noticia->getTitularesCategoria($categoria, $limit);
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

		public static function Equipo($id)
		{
			return self::$_equipo->getInfoEquipo($id);
		}

		public static function NoticiaPanel()
		{
			return self::$_noticia->getNoticiasPanel();
		}

		public static function MinutoPartido()
		{
			return self::$_post_minuto->getMinutoPartido();
		}

		public static function ConsultarDatosUsuario($id)
		{
			return self::$_usuario->getConsultarDatosUsuario($id);
		}

		public static function ProximosPartidos()
		{
			return self::$_partido->getProximosPartidos();
		}

		public static function FormatoFecha($fecha)
		{
			return self::$_helper->getFormatoFecha($fecha);
		}

		public static function FormatoHora($hora)
		{
			return self::$_helper->getFormatoHora($hora);
		}
	}
?>