<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:14
	*/
	class DateHelper
	{
		public static function getFormatoFecha($fecha)
		{
			$dias = array(
				"Domingo",
				"Lunes",
				"Martes",
				"Miercoles",
				"Jueves",
				"Viernes",
				"Sábado"
			);

			$meses = array(
				"Enero",
				"Febrero",
				"Marzo",
				"Abril",
				"Mayo",
				"Junio",
				"Julio",
				"Agosto",
				"Septiembre",
				"Octubre",
				"Noviembre",
				"Diciembre"
			);

			return $dias[date('w',strtotime($fecha))].", ".date('d',strtotime($fecha))." de ".$meses[date('n',strtotime($fecha))-1]. " del ".date('Y',strtotime($fecha)) ;
		}

		public static function getFormatoHora($hora)
		{
			$hora = date("h:i a",strtotime($hora));
			
			return $hora;
		}

		public static function getVisita()
		{
			$url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$ipUsuario = base64_encode($_SERVER['REMOTE_ADDR']);

			return ['url' => $url, 'ip' => $ipUsuario];
		}
	}
?>