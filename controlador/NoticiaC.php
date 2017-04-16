<?php
	/**
	* 
	*/
	include '../modelo/NoticiaM.php';
	class NoticiaC extends NoticiaM
	{
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
	}
?>