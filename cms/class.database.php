<?php
class db extends mysqli {
		
	private $dbHost = 'rdbms.strato.de';
	private $dbName = 'DB2105728';
	private $dbUsername = 'U2105728';
	private $dbPassword = '2p6rs3xm';
	protected static $instance;
	
	private function __construct() {
		parent::__construct($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
		
		if ( mysqli_connect_errno() ) {
			throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
		}
	}
	
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function query($query) {
		if ( !$this->real_query($query)) {
			die($this->error);
		}
		
		$result = new mysqli_result($this);
		return $result;
	}
}
?>