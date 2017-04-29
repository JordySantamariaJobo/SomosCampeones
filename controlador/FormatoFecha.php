<?php
	/**
	* Cambiar el formato de las fechas
	*/
	class FormatoFecha
	{
		function ModificarFecha($fecha){
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			return $dias[date('w',strtotime($fecha))].", ".date('d',strtotime($fecha))." de ".$meses[date('n',strtotime($fecha))-1]. " del ".date('Y',strtotime($fecha)) ;
		}

		function ModificarHora($hora){
			$hora = date("H:i a",strtotime($hora));
			return $hora;
		}
	}
?>