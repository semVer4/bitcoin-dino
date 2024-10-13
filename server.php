<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];

    $apiKey = "AIzaSyCnLChxywqYvHujg280c5x7BM-PVdYu2MQ";

    $spreadsheetId1 = "190ABg5LQuawW8Bu6YmKFpTFE87vzNBgXsaNA360nJi0"; 

    $url1 = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId1/values/A:B?key=$apiKey";

    $response1 = file_get_contents($url1);

    $dataFromSheet1 = json_decode($response1, true);

    $found1 = false;
    foreach ($dataFromSheet1["values"] as $row) {
        if (in_array($data, $row)) {
            $found1 = true;
            break;
        }
    }

    if ($found1) {
        echo "<span><b id='resY'>CONGRATS!</b><br>You are in<br>GTD Phase</span>";
    } else {
        echo "<span><b id='resN'>Upsie...</b><br>We didn't found<br>your wallet</span>";
    }
}

?>