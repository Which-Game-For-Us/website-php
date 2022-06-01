<?php
class gameDatabase extends Database {
	// we create a constructor for the gameDatabase class
	public function __construct() {
		// we call the parent constructor
		parent::__construct();
	}

	// we create a function to get a list of all games, using parent::query()
	public function getAllGames() {
		$sql = "SELECT * FROM games";
		$arg = [];
		return parent::query($sql, $arg);
	}

	// we create a function to add a new game, using parent::query()
	public function addGame($name) {
		$sql = "INSERT INTO games (name) VALUES (:name)";
		$arg = [':name' => $name];
		return parent::query($sql, $arg);
	}
}