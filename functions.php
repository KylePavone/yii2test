<?php


function appendName($arr) {
    for ($i = 0; $i < 10; $i++) {
        echo("<br>");
    }
    foreach($arr as $item) {
        echo($item .= "Gay!" . "<br>");
    }
}