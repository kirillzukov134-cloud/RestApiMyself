<?php
require "./DataBase/connectDB.php";

header("Content-Type: application/json");

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$id = $_GET["id"];
$name = $data["name"];
$surname = $data["surname"];
$groups = $data["groups"];
$email = $data["email"];

$sql = "UPDATE students SET name = :name, surname = :surname, groups = :groups, email = :email WHERE id =  :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name'=>$name, 
    ':surname'=>$surname, 
    ':groups'=>$groups, 
    ':email'=>$email, 
    ':id'=>$id
]);

$response = [
    "id" => $id,
    "name" => $name,
    "surname" => $surname,
    "groups" => $groups,
    "email"=> $email,
];

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);