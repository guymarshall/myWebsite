<?php

require_once 'page.php';

function generatePassword(): ?string
{
    $url = 'https://random-word-api.herokuapp.com/word?number=4';

    $curlHandle = curl_init($url);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curlHandle);

    if (curl_errno($curlHandle)) {
        echo 'cURL error: ' . curl_error($curlHandle);
        curl_close($curlHandle);
        return null;
    }

    curl_close($curlHandle);

    $data = json_decode($response, true);
    return implode('-', $data) ?? null;
}

$page = new Page('Password Generator');

$page->render();
