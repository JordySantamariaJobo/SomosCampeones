<?php

    abstract class DBConn {

    	private static $db_host = "localhost";
    	private static $db_user = "root";
    	private static $db_pass = "Barcelona1994JordySantamaria";
    	protected $db_name = "SomosCampeones";
    	private static $conn;

    	public function open_conn(){
    		try {
    			
    			$this->conn = new PDO('mysql:host=localhost;dbname=SomosCampeones', self::$db_user, self::$db_pass);
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $this->conn;

    		} catch (PDOException $e) {
    			return "ERROR: ".$e->getMessage();
    		}
    	}
    }
?>