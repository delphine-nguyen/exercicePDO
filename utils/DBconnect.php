<?php

class DBconnect
{
	private static $instance = null;
	private PDO $connexion;

	public function __construct(
		string $dsn,
		string $username,
		string $password
	) {
		try {
			$this->connexion = new PDO(
				dsn: $dsn,
				username: $username,
				password: $password
			);
			$this->connexion->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function getPdo(): PDO
	{
		return $this->connexion;
	}

	public static function getInstance(string $dsn, string $username, string $password)
	{
		if (is_null(self::$instance)) {
			try {
				self::$instance = new DBconnect(
					dsn: $dsn,
					username: $username,
					password: $password
				);
				return self::$instance;
			} catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}
		return self::$instance;
	}
}
