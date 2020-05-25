<?php
require 'db_credentials.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database created successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

// Choose database
$sql = "USE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database changed";
} else {
    echo "<br>1 Error creating database: " . mysqli_error($conn);
}

// sql to create table
$sql = "CREATE TABLE Post (
  idPost INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(50) NOT NULL,
  subtitulo VARCHAR(200) NOT NULL,
  corpoPost VARCHAR(5000) NOT NULL,
  data_criado VARCHAR(10) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table Post created successfully";
} else {
    echo "<br> 2 Error creating database: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Comentario (
  idCom INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  corpoComentario VARCHAR(500) NOT NULL,
  dataComentario VARCHAR(10) NOT NULL, 
  FK_IdPost INT(6) UNSIGNED,
  FOREIGN KEY (FK_IdPost) REFERENCES Post (idPost)
)";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table Comentario created successfully";
} else {
    echo "<br> 4 Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
