<?php

    abstract class DBConn {

    	private static $db_host = "localhost";
    	private static $db_user = "root";
    	private static $db_pass = "Barcelona1994JordySantamaria";
    	private static $db_name = "SomosCampeones";
        private static $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', );
    	private static $conn;

    	public function open_conn(){
    		try {
    			
    			$this->conn = new PDO('mysql:host='.self::$db_host.';dbname='.self::$db_name, self::$db_user, self::$db_pass, self::$db_options);
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $this->conn;

    		} catch (PDOException $e) {
    			return "ERROR: ".$e->getMessage();
    		}
    	}
    }
?>