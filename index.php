<?php

require "./DataBase/connectDB.php";

header("Content-Type: application/json");

$sql = "SELECT * FROM students";
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);