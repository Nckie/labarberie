<?php
function debug($data, $var_dump = false) {
    echo "<pre style=\"background:#" . dechex(rand(0x000000, 0xFFFFFF)) . "\">";
    if (!$var_dump) {
        print_r($data); 
    } else {
        var_dump($data);
    }
    echo "</pre>";
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>