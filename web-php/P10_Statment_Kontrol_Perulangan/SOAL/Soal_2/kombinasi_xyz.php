<?php
$target = 25;
$count = 0;

for ($x = 1; $x <= $target - 2; $x++) {
    for ($y = 1; $y <= $target - $x - 1; $y++) {
        $z = $target - $x - $y;
        if ($z >= 1) {
            echo "x = $x, y = $y, z = $z<br>";
            $count++;
        }
    }
}

echo "<br>Jumlah penyelesaian : $count";
?>
