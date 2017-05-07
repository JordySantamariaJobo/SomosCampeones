<?php
	class NoticiaC extends NoticiaM
	{
		public $Id;
		public $Titulo;
		
		public function __construct($id, $titulo)
		{
			$this->Id = $id;
			$this->Titulo = $titulo;
		}

		public function ConsultarNoticia()
		{
			return NoticiaM::ConsultarNoticia($this->Id, $this->Titulo);
		}

		public function ConsultarDatosUsuario($idUsuario)
		{
			return NoticiaM::ConsultarDatosUsuario($idUsuario);
		}

		public function ListaNoticias($idUsuario)
		{
			return NoticiaM::ListaNoticias($idUsuario);
		}
	}
?>