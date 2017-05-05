<?php
	include '../../modelo/UsuarioM.php';
	include '../../modelo/NoticiaM.php';

	class UsuarioC extends UsuarioM
	{
		public $idUsuario;
		public $CorreoUsuario;

		public function __construct($IdUsuario, $Correo)
		{
			$this->idUsuario = $IdUsuario;
			$this->CorreoUsuario = $Correo;
		}

		public function DatosUsuario()
		{
			return UsuarioM::DatosUsuario($this->CorreoUsuario);
		}

		public function HistorialUsuario()
		{
			return UsuarioM::HistorialUsuario($this->idUsuario);
		}

		public function HistorialPartidosApostados()
		{
			$contenedor = "";

			$historial = UsuarioM::HistorialPartidosApostados($this->idUsuario);

			foreach ($historial as $valor) {
				$equipoL = NoticiaM::ConsultarEquipo($valor['id_local']);
				$equipoV = NoticiaM::ConsultarEquipo($valor['id_visitante']);
                $contenedor .= "<tr>
                    <td>".$equipoL['nombre_e']." ".$valor['gol_l']." - ".$valor['gol_v']." ".$equipoV['nombre_e']."</td>
                    <td>".$valor['competencia_p']."</td>
                    <td>".$valor['punt']."</td>
                </tr>";
            }

            return $contenedor;
		}

		public function TitularesDelDia($equipo)
		{
			$contenedor = "";

			$noticias = UsuarioM::TitularesDelDia($equipo);

			while ($result = mysqli_fetch_array($noticias, MYSQLI_ASSOC)) {
				$contenedor .= "<div class='col-sm-4' style='overflow: hidden;'><br>
				<div class='thumbnail thumb-material'>
      					<img src='../../libs/img/Noticias/".$result['foto_ruta']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      					<div class='caption'>
        					<h3 class='M8'>".$result['titulo']."</h3>
        					<p class='M4 Descripcion' style='text-align: justify;'>".$result['breve_desc']."...</p>
      					</div><hr class='hrThumbMaterial'>
      					<center>
      						<strong>
      							<a href='noticias.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."' class='M9'>LEER MÁS</a>
      						</strong>
      					</center>
    				</div>
				</div>";
			}

			return $contenedor;
		}

		public function NotificacionesNoticias($equipo)
		{
			$contenedor = "";

			$noticias = UsuarioM::TitularesDelDia($equipo);

			foreach ($noticias as $result) {
				$contenedor .= "<li class='timeline-item'>
                    <div class='timeline-icon bg-dark light'>
                        <span class='fa fa-newspaper-o'></span>
                    </div>
                    <div class='timeline-desc'>
                        ".$result['titulo']."
                        <a href='noticias.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>Leer Más</a>
                    </div>
                    <div class='timeline-date'></div>
                </li>";
			}

			return $contenedor;
		}

		public function Anuncio()
		{
			$num = rand(1,10);

			return UsuarioM::GeneradorAnuncios($num);
		}
	}
?>