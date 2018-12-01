<?php

	function ft_connect_database() {
		$dbname = 'camagru_db';
		$servername = 'localhost';
		$dbusername = 'root';
		$dbpasswrd = 'password';
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpasswrd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";
			return ($conn);
		}
		catch(PDOException $e) {
			echo "connection failed: ".$e->getMessage();
		}
	}

	function ft_create_database() {
		$dbname = 'camagru_db';
		$servername = 'localhost';
		$dbusername = 'root';
		$dbpasswrd = 'password';
		try {
			$conn = new PDO("mysql:host=$servername", $dbusername, $dbpasswrd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
			$conn->exec($sql);
			echo "Database successfully created<br>";
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		$conn = null;
	}

	function ft_create_tables() {
		$conn = ft_connect_database();
		try {
			$sql = "CREATE TABLE Users (
				id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				username VARCHAR(30) NOT NULL,
				email VARCHAR(255) NOT NULL,
				passwd VARCHAR(1000) NOT NULL,
				firstname VARCHAR(45) NOT NULL,
				lastname VARCHAR(45) NOT NULL,
				refcode varchar(1000) NOT NULL,
				confirmed int(1) NOT NULL
			)";
			$conn->exec($sql);
			echo "Table 'Users' created successfully";
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		try {
			$sql = "CREATE TABLE Images (
				id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				imagename VARCHAR(30) NOT NULL,
				userid int(10) NOT NULL,
				votes int(10) NOT NULL
			)";
			$conn->exec($sql);
			echo "Table 'Images' created successfully";
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		$conn = null;
	}
	
?>
