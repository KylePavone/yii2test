<?= $info ?>
<?php
echo($name."<br>");
$i = 0;
for (;;) {
    echo($authors[$i])."<br>";
    $i++;
    if ($i === count($authors)) break;
}
?>