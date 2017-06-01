<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Apuesta
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $this->open_conn();

		}
		
		/**
     		* [getApuestasDisponibles Funcion que devuelve los partidos disponibles para apostar]
     		* @param [int] $idUsuario [ID unico del Usuario]
		* @return [array] $res
		* @author Jordy Santamaria <santmjoy@gmail.com>
     		*/
		public function getApuestasDisponibles($idUsuario)
		{
			try{
				
				$sql = $this->_connection->prepare("CALL PartidosDisponiblesApostar(?)");
				$sql->bindParam(1, $idUsuario);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;
				
			} catch(Exception $e){
				return $e->getMessage();
			}
		}
		
		/**
     		* [setApostarPartido Funcion que inserta una nueva apuesta]
		* @param [int] $idPartido [ID unico del Partido]
     		* @param [int] $idUsuario [ID unico del Usuario]
		* @param [float] $cantidad [Cantidad a apostar por el usuario]
		* @param [float] $porcentaje [Porcentaje por el cual apuesta el usuario]
		* @author Jordy Santamaria <santmjoy@gmail.com>
     		*/
		public function setApostarPartido($idPartido, $idUsuario, $cantidad, $porcentaje)
		{
			try{
				
				$sql = $this->_connection->prepare("CALL ApostarPartido(?,?,?,?)");
				$sql->bindParam(1, $idPartido);
				$sql->bindParam(2, $idUsuario);
				$sql->bindParam(3, $cantidad);
				$sql->bindParam(4, $porcentaje);
				$sql->execute();
				
			} catch(Exception $e){
				return $e->getMessage();
			}
		}
		
		/**
     		* [getHistorialApuesta Funcion que devuelve el historial de partidos apostar por el usuario]
		* @param [int] $idUsuario [ID unico del Usuario]
		* @return $res
		* @author Jordy Santamaria <santmjoy@gmail.com>
     		*/
		public function getHistorialApuesta($idUsuario)
		{
			try{
				
				$sql = $this->_connection->prepare("CALL HistorialApuestas(?)");
				$sql->bindParam(1, $idUsuario);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);
				
				return $res;
				
			} catch(Exception $e){
				return $e->getMessage();
			}
		}
		
		/**
     		* [getUltimasApuestas Funcion que devuelve las ultimas apuestas realizadas en todo el sistema]
		* @return $res
		* @author Jordy Santamaria <santmjoy@gmail.com>
     		*/
		public function getUltimasApuestas()
		{
			try{
				$sql = $this->_connection->prepare("SELECT u.nombreusuario ,u.imagen, p.competencia_p, e.nombre_e AS 'equipoLocal', ev.nombre_e AS 'equipoVisita', a.punt, a.porc, p.porLocal, p.porEmpate, p.porVisita FROM Usuario u INNER JOIN Apuesta a ON u.id_usuario = a.id_usuario INNER JOIN Partido p ON a.id_partido = p.id_partido INNER JOIN Equipo e ON p.id_local = e.id_equipo INNER JOIN Equipo ev ON p.id_visitante = ev.id_equipo ORDER BY a.id_apuesta DESC LIMIT 4");
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);
				
				return $res;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>
