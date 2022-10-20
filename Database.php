<?php

class Database
{

	function connect()
	{
		$host = 'db';
		$dbname = 'superlogica';
		$user = 'root';
		$pass = 'root';

		$dsn = "mysql:host=$host;dbname=$dbname";

		try {
			$DBH = new PDO($dsn, $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $DBH;
		} catch (PDOException $e) {

			echo 'ERROR: ' . $e->getMessage();
		}
	}

	/**
	 * @param string $query string que vem do Users para executar a query.
	 * @param array $params array com as chaves que serão inseridas no BD.
	 */
	public function execute(string $query,array $params = [])
	{
		try {
			$stmt = $this->connect()->prepare($query);
			$stmt->execute($params);

			return $stmt;
		} catch (PDOException $e) {
			die('ERROR: ' . $e->getMessage());
		}
	}

	
}
