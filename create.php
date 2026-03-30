<?php

require "./DataBase/connectDB.php";

header("Content-Type: application/json");

$name = $_POST["name"];
$surname = $_POST["surname"];
$groups = $_POST["groups"];
$email = $_POST["email"];


$sql = "INSERT INTO students (name, surname, groups, email) VALUES (:name, :surname, :groups, :email)";
$statement = $pdo->prepare($sql);
$statement->execute([
    ":name"=> $name,
    ":surname"=> $surname,
    ":groups"=> $groups,
    ":email"=> $email
]);

$response = [
    "id" => $pdo->lastInsertId(),
    "name"=> $name,
    "surname"=> $surname,
    "groups"=> $groups,
    "email"=> $email
];

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);