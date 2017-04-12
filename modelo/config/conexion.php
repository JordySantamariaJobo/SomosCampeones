<?php
/**
* Conexion Segura a la Base de Datos
*/
class ConexionBD{
    private $host, $user, $pass, $name;
  
    function __construct() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->name = 'SomosCampeones';
    }
    
    public function conectarBD(){
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($conn->connect_error) { die("Conexion fallida: ".$conn->connect_error); }
        else{ return $conn; }
    }
}
?>
