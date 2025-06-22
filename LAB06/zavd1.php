<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Помилка з'єднання: " . $conn->connect_error);
}

$sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_db) === TRUE) {
  echo "База даних 'Library' створена успішно або вже існує.<br>";
} else {
  echo "Помилка створення бази даних: " . $conn->error;
}

$conn->select_db($dbname);

$sql_table = "CREATE TABLE IF NOT EXISTS Members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    membership_date DATE NOT NULL
)";
if ($conn->query($sql_table) === TRUE) {
  echo "Таблиця 'Members' створена успішно або вже існує.<br>";
} else {
  echo "Помилка створення таблиці: " . $conn->error;
}
$conn->close();
?>