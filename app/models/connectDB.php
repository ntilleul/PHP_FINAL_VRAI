<?php
try {
	$host = "localhost";
	$dbname = "TP_FINAL";
	$user = "root";

	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);
} catch (Exception $e) {
	die("Erreur : " . $e->getMessage());
}