<?php

class DAO {

  // Properties
	/*
  	private static $dbHost = "localhost";
	private static $dbName = "kruideniers_gilde";
	private static $dbUser = "kruideniers_gilde";
	private static $dbPass = "kruidenier2019";
	*/
	
	private static $dbHost = "ID282100_20182019.db.webhosting.be";
	private static $dbName = "ID282100_20182019";
	private static $dbUser = "ID282100_20182019";
 	private static $dbPass = "ClCt2913";
	

	private static $sharedPDO;
	protected $pdo;

  // Constructor
	function __construct() {

		if(empty(self::$sharedPDO)) {
			self::$sharedPDO = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPass);
			self::$sharedPDO->exec("SET CHARACTER SET utf8");
			self::$sharedPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$sharedPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		$this->pdo =& self::$sharedPDO;

	}

  // Methods

}

 ?>
