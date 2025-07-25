<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents("php://input");
    file_put_contents("savegame.json", $json);
    echo json_encode(["status" => "success"]);
} else {
    http_response_code(405);
    echo json_encode(["error" => "Méthode non autorisée"]);
}
?>
