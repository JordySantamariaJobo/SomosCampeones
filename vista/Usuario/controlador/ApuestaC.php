<?php
	include '../../modelo/ApuestaM.php';
	/**
	*
	*/
	class ApuestaC extends ApuestaM
	{
		public function ApuestasDisponibles()
		{
			return ApuestaM::ApuestasDisponibles();
		}

		public function ConsultarEquipo($idEquipo)
		{
			return ApuestaM::ConsultarEquipo($idEquipo);
		}
	}
?>