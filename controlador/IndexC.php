<?php
	/**
	* CIndex
	*/
	include 'modelo/IndexM.php';
	class IndexC extends IndexM
	{
		function __construct(){}

		public function TitularNav($competencia)
		{
			return IndexM::TitularNav($competencia);
		}

		public function NoticiasNav($competencia)
		{
			return IndexM::NoticiasNav($competencia);
		}

		public function NoticiaJumbotron()
		{
			return IndexM::NoticiaJumbotron();
		}

		public function TitularesDelDia()
		{
			return IndexM::TitularesDelDia();
		}

		public function TitularesChampions()
		{
			return IndexM::TitularesChampions();
		}

		public function NoticiasEspecial()
		{
			return IndexM::NoticiasEspecial();
		}

		public function Partidos()
		{
			return IndexM::Partidos();
		}

		public function Anuncio()
		{
			$num = rand(1,10);

			return IndexM::GeneradorAnuncios($num);
		}

		public function SoundCloud()
		{
			return IndexM::SoundCloud();
		}

		public function Equipo($id)
		{
			return IndexM::ConsultarEquipo($id);
		}

		public function NoticiaPanel()
		{
			return IndexM::NoticiaPanel();
		}

		public function MinutoPartido()
		{
			return IndexM::MinutoPartido();
		}

		public function ConsultarDatosUsuario($id)
		{
			return IndexM::ConsultarDatosUsuario($id);
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