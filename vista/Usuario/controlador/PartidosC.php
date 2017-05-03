<?php
	include '../../modelo/PartidosM.php';

	class PartidosC extends PartidosM
	{
		public function PartidosEnVivo()
		{
			return PartidosM::PartidosEnVivo();
		}
	}
?>