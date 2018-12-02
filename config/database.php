<?php

	function ft_connect_database() {
		$dbname = 'camagru_db';
		$servername = 'localhost';
		$dbusername = 'root';
		$dbpasswrd = 'password';
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpasswrd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		try {
			$sql = "CREATE TABLE Images (
				id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				imagename VARCHAR(30) NOT NULL,
				filePath VARCHAR(255) NOT NULL,
				sticker VARCHAR(30) NOT NULL,
				merged TINYINT NOT NULL,
				userid int(10) NOT NULL,
				votes int(10) NOT NULL
			)";
			$conn->exec($sql);
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		try {
			$sql = "CREATE TABLE comments (
				id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				comment VARCHAR(2047) NOT NULL,
				authorid int(30) NOT NULL,
				imageid int(30)
			)";
			$conn->exec($sql);
		}
		catch(PDOException $e) {
			echo $sql."<br>".$e->getMessage();
		}
		$conn = null;
	}
	
?>
