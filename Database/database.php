<?php

/** We create a new PDO database connection,
 * set the PDO error mode to exception,
 * create a function to get the database connection,
 * create a query function to execute a query with args to the database,
 * and create a function to close the database connection.
 */
class Database {
	// We create a private variable for the database connection
	private $db;
	// We create a constructor for the database class
	public function __construct() {
		// We create a new PDO database connection
		$this->db = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');
		// We set the PDO error mode to exception
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	// We create a function to get the database connection
	public function getConnection() {
		return $this->db;
	}
	// We create a query function to execute a query with args as PDO bindParam
	public function query($query, $args = []) {
		// We create a new PDO statement
		$stmt = $this->db->prepare($query);
		// We bind the args to the PDO statement
		foreach ($args as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		// We execute the PDO statement
		$stmt->execute();
		// We return the PDO statement
		return $stmt;

	}
	// We create a function to close the database connection
	public function close() {
		$this->db = null;
	}
}