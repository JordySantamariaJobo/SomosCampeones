<?php
	include '../../modelo/HistorialM.php';

	class HistorialC extends HistorialM
	{
		public $idUsuario;
		
		public function __construct($IdUsuario)
		{
			$this->idUsuario = $IdUsuario;
		}

		public function HistorialApuesta()
		{
			return HistorialM::HistorialApuesta($this->idUsuario);
		}

		public function DatosGeneralesPartido($idPartido)
		{
			return HistorialM::DatosGeneralesPartido($idPartido);
		}
	}
?>