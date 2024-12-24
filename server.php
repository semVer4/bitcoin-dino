<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];

    $url1 = "";

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
