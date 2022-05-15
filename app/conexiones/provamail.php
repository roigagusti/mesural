<?php

$url = 'https://api.enviaremail.ml';
$ch = curl_init($url);

$data = array(
    'to' => 'agusti.roig@outlook.com',
    'subject' => '12345688',
    'body' => 'This is a test email sent using cURL!'
);
$payload = json_encode($data);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

echo "ara";
print_r($result);
?>