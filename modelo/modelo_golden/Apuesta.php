<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\Apuesta;

	class Apuesta
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getApuestasDisponibles($idUsuario)
		{
			$q = "CALL PartidosDisponiblesApostar($idUsuario)";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function setApostarPartido($idPartido, $idUsuario, $cantidad, $porcentaje)
		{
			$q = "CALL ApostarPartido($idPartido, $idUsuario, $cantidad, $porcentaje)";

			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function getHistorialApuesta($idUsuario)
		{
			$q = "CALL HistorialApuestas($idUsuario)";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function getUltimasApuestas()
		{
			$q = "SELECT u.nombreusuario ,u.imagen, p.competencia_p, e.nombre_e AS 'equipoLocal', ev.nombre_e AS 'equipoVisita', a.punt, a.porc, p.porLocal, p.porEmpate, p.porVisita FROM Usuario u INNER JOIN Apuesta a ON u.id_usuario = a.id_usuario INNER JOIN Partido p ON a.id_partido = p.id_partido INNER JOIN Equipo e ON p.id_local = e.id_equipo INNER JOIN Equipo ev ON p.id_visitante = ev.id_equipo ORDER BY a.id_apuesta DESC LIMIT 4";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>