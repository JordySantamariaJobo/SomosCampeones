<?php
	include '../../modelo/ApuestaM.php';
	
	class ApuestaC extends ApuestaM
	{
		public function ApuestasDisponibles()
		{
			return ApuestaM::ApuestasDisponibles($_SESSION['IdUsuario']);
		}

		public function ConsultarEquipo($idEquipo)
		{
			return ApuestaM::ConsultarEquipo($idEquipo);
		}
	}
?>