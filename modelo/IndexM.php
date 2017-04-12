<?php
/**
*  Funciones para la pagina principal -> index.php
*/
include 'config/conexion.php';
class IndexM {
	
	private $_connect;

	function __construct(){}

	public function TitularNav($competencia)
	{
		include 'config/conn.php';

		$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 1";
		$r = mysqli_query($conn, $q);
		$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $res;
	}

	public function NoticiasNav($competencia)
	{
		include 'config/conn.php';

		$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 3";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	public function NoticiaJumbotron(){

		include 'config/conn.php';

		$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 1";
		$r = mysqli_query($conn, $q);
		$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $res;
	}

	public function TitularesDelDia(){

		include 'config/conn.php';

		$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 3";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	public function TitularesChampions(){

		include 'config/conn.php';

		$q = "SELECT *FROM Noticia WHERE categoria = 'Champions League' ORDER BY id_noticia DESC LIMIT 3";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	public function Partidos(){

		include 'config/conn.php';

		$q = "SELECT *FROM PartidosEnJuego";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	public function UltimasApuestas(){

		include 'config/conn.php';

		$q = "SELECT u.nombreusuario ,u.imagen, p.competencia_p, e.nombre_e AS 'equipoLocal', ev.nombre_e AS 'equipoVisita', a.punt, a.porc, p.porLocal, p.porEmpate, p.porVisita FROM Usuario u INNER JOIN Apuesta a ON u.id_usuario = a.id_usuario INNER JOIN Partido p ON a.id_partido = p.id_partido INNER JOIN Equipo e ON p.id_local = e.id_equipo INNER JOIN Equipo ev ON p.id_visitante = ev.id_equipo ORDER BY a.id_apuesta DESC LIMIT 4";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	public function GeneradorAnuncios($num){

		include 'config/conn.php';

		$q = "CALL GeneradorAnuncios($num)";
		$r = mysqli_query($conn, $q);
		$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $result['code_ad'];
	}

	public function SoundCloud(){

		include 'config/conn.php';

		$q = "SELECT code_sound FROM SoundCloud ORDER BY id_sound DESC";
		$r = mysqli_query($conn, $q);
		$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $result['code_sound'];
	}

	public function ConsultarEquipo($id){

		include 'config/conn.php';

		$q = "CALL DatosEquipo($id)";
		$r = mysqli_query($conn, $q);
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $row;
	}

	public function NoticiasEspecial() {
		
		include 'config/conn.php';

		$q = "SELECT *FROM Noticia WHERE categoria = 'Champions League' ORDER BY id_noticia DESC LIMIT 5";
		$r = mysqli_query($conn, $q);

		return $r;
	}

	//Cuando el usuario haga login, aqui se validaran los datos ingresados para verificar si son correctos.
	public function LoginUsuario($correoEn, $contrasenaEn) {

		$correo = base64_decode($correoEn);
		$contrasena = base64_decode($contrasenaEn);

		include 'config/conn.php';

		$q3 = "CALL DatosUsuario('$correo')";
		$r3 = mysqli_query($conn, $q3);

		$ArregloDatos = mysqli_fetch_array($r3, MYSQLI_ASSOC);

		if ($correo == $ArregloDatos['correo'] && password_verify($contrasena, $ArregloDatos['pwd'])) {
			if ($ArregloDatos['tipoUsuario'] == "Cliente") { return "Cliente"; }
			else if($ArregloDatos['tipoUsuario'] == "Admin"){ return "Admin"; }
			else if($ArregloDatos['tipoUsuario'] == "Master"){ return "Master"; }
		}
		else { return "Error"; }
	}

	public function ConsultarDatosUsuario($id){

		include 'config/conn.php';

		$q = "SELECT *FROM Usuario WHERE id_usuario = $id";
		$r = mysqli_query($conn, $q);
		$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

		return $res;
	}

	public function ValidarSesion($correoEn) {

		$correo = base64_decode($correoEn);
		
		include 'config/conn.php';

		$q = "CALL DatosUsuario('$correo')";
		$r = mysqli_query($conn, $q);

		$DatosUsuario = mysqli_fetch_array($r, MYSQLI_ASSOC);

		$_SESSION['IdUsuario'] = $DatosUsuario['id_usuario'];
		$_SESSION['CorreoUsuario'] = $DatosUsuario['correo'];
		$_SESSION['NombreDeUsuario'] =  $DatosUsuario['nombreusuario'];
		$_SESSION['TipoUsuario'] = $DatosUsuario['tipoUsuario'];
	}

	public function ReactivarCuenta($correoEn) {

		$correo = base64_decode($correoEn);

		include 'config/conn.php';

		$q = "CALL ReActivarUsuario('$correo')";
		$r = mysqli_query($conn, $q);
	}

	function BuscadorAvanzado($palabra){
			
		include 'config/conn.php';

		$q = "CALL BuscadorAvanzado('$palabra')";
		$r = mysqli_query($conn, $q);
		
		return $r;
	}
}
?>