<?php
header('Content-Type: application/json');
if (file_exists("savegame.json")) {
    echo file_get_contents("savegame.json");
} else {
    echo json_encode([
        "xp" => 0,
        "level" => 1,
        "gold" => 0,
        "deadspot" => 0,
        "ghs" => 0,
        "doubleClick" => false,
        "autoClick" => false,
        "megaClickActive" => false
    ]);
}
?>
