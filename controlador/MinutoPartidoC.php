<?php
	/**
	* Controlador de MinutoPartido
	*/
	include '../modelo/MinutoPartidoM.php';

	class MinutoPartidoC extends MinutoPartidoM
	{
		public $id;
		public $titulo;

		public function __construct($idPartido, $tituloPartido)
		{
			$this->id = $idPartido;
			$this->titulo = $tituloPartido;
		}

		public function InfoGeneral()
		{
			return MinutoPartidoM::InfoGeneral($this->id);
		}

		public function InfoEquipo($idEquipo)
		{
			return MinutoPartidoM::InfoEquipo($idEquipo);
		}

		public function MinutoMinuto()
		{
			return MinutoPartidoM::MinutoMinuto($this->id);
		}

		public function ConsultarDatosUsuario()
		{
			return MinutoPartidoM::ConsultarDatosUsuario($this->id);
		}

		public function SoundCloud()
		{
			return MinutoPartidoM::SoundCloud();
		}

		public function NoticiaPanel()
		{
			return MinutoPartidoM::NoticiaPanel();
		}

		public function Anuncio()
		{
			$num = rand(1,10);

			return MinutoPartidoM::GeneradorAnuncios($num);
		}
	}
?>