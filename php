<?php
// faucetpay.php

// Remplace par ta vraie API Key FaucetPay
$api_key = 'TA_CLE_API_ICI';

// Récupération des données POST
$wallet_address = $_POST['wallet'] ?? '';
$amount = floatval($_POST['amount'] ?? 0);
$currency = $_POST['currency'] ?? '';

if (!$wallet_address || $amount <= 0 || !$currency) {
    echo json_encode(["status" => "error", "message" => "Données invalides."]);
    exit;
}

// Appel API FaucetPay
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://faucetpay.io/api/v1/send');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'api_key' => $api_key,
    'to' => $wallet_address,
    'amount' => $amount,
    'currency' => strtoupper($currency),
]);

$response = curl_exec($ch);
curl_close($ch);

// Affichage du résultat
$result = json_decode($response, true);
if ($result && $result['status'] === 200) {
    echo json_encode(["status" => "success", "message" => "Transaction envoyée !"]);
} else {
    echo json_encode(["status" => "error", "message" => $result['message'] ?? "Erreur inconnue."]);
}
?>
