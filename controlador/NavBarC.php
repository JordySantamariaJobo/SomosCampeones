<?php
	/**
	* 
	*/
	include '../modelo/NavBarM.php';

	class NavBarC extends NavBarM
	{
		public function TitularNav($competencia)
		{
			return NavBarM::TitularNav($competencia);
		}

		public function NoticiasNav($competencia)
		{
			return NavBarM::NoticiasNav($competencia);
		}

		public function TitularesDelDia()
		{
			return NavBarM::TitularesDelDia();
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