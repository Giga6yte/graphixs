<?php
class SQL {
    public static $_instance;
    public $mysql_connection;
// www.db4free.net
    const WHITE_IP_DB = 'mysql:host=db4free.net;dbname=a8206370_tasks;charset=UTF8';
    const WHITE_IP_USER = 'a8206370_roots';
    const WHITE_IP_PASSWORD = 'Ckj;ysq123';
// www.members.000webhost.com
	// const WHITE_IP_DB = 'mysql:host=db4free.net;dbname=a8206370_tasks;charset=UTF8';
    // const WHITE_IP_USER = 'a8206370_roots';
    // const WHITE_IP_PASSWORD = 'Ckj;ysq123';

    public function __construct() {
        // $this->mysql_connection = new \PDO(self::WHITE_IP_DB, self::WHITE_IP_USER, self::WHITE_IP_PASSWORD);
        $this->mysql_connection = new PDO(self::WHITE_IP_DB, self::WHITE_IP_USER, self::WHITE_IP_PASSWORD);
    }

    public function __clone() {
    }

    public static function getInstance() {
        if (is_null(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

	public function getResult($query) {

		// try {
			// $mysql_conn = new PDO('mysql:host=db4free.net;dbname=a8206370_tasks', 'a8206370_roots', 'Ckj;ysq123');
			// echo "MySQL OK!\n";
		// } catch (PDOException $e) {
			// echo "MySQL connection failed!\n {$e->getMessage()}\n";
		// }

		foreach ($this->mysql_connection->query($query) as $row) {
			$result[] = $row;
		}

        return $result;
    }
}