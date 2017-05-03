<?php
	include '../../modelo/ConfiguracionM.php';

	class ConfiguracionC extends ConfiguracionM
	{

		public function ListaEquipos()
		{
			return ConfiguracionM::ListaEquipos();
		}
	}
?>