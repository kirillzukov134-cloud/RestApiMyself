<?php

require "./DataBase/connectDB.php";

header("Content-Type: application/json");

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([":id" => $id]);

if ($statement->rowCount() > 0) {
    $response = [
        "status" => true,
        "message" => "Deleted successfully",
        "id" => $id
    ];
    http_response_code(200);
} else {
    $response = [
        "status" => false,
        "message" => "Error"
    ];
    http_response_code(400);
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

?>