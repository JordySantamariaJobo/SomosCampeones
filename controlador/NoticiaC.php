<?php
	/**
	* 
	*/
	include '../modelo/NoticiaM.php';
	class NoticiaC extends NoticiaM
	{
		
		function __construct(){}

		public function TitularNav($competencia)
		{
			return NoticiaM::TitularNav($competencia);
		}

		public function NoticiasNav($competencia)
		{
			return NoticiaM::NoticiasNav($competencia);
		}

		public function TitularesDelDia()
		{
			return NoticiaM::TitularesDelDia();
		}

		public function ConsultarNoticia($id, $titulo)
		{
			return NoticiaM::ConsultarNoticia($id, $titulo);
		}

		public function ConsultarDatosUsuario($id)
		{
			return NoticiaM::ConsultarDatosUsuario($id);
		}

		public function NoticiasPrincipal()
		{
			return NoticiaM::NoticiasPrincipal();
		}

		public function TeRecomendamos($idNoticia)
		{
			return NoticiaM::TeRecomendamos($idNoticia);
		}

		public function Partidos()
		{
			return NoticiaM::Partidos();
		}

		public function VerificarGustos()
		{
			return NoticiaM::VerificarGustos();
		}

		public function ConsultarEquipo($idEquipo)
		{
			return NoticiaM::ConsultarEquipo($idEquipo);
		}

		public function Anuncio()
		{
			$num = rand(1,10);

			return NoticiaM::GeneradorAnuncios($num);
		}

		public function Equipo($id)
		{
			return NoticiaM::ConsultarEquipo($id);
		}

		public function SoundCloud()
		{
			return NoticiaM::SoundCloud();
		}

		public function NoticiaPanel()
		{
			return NoticiaM::NoticiaPanel();
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