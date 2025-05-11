<?php
function celsiusToFahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}

$c = 25;
echo "$c °C = " . celsiusToFahrenheit($c) . " °F" . PHP_EOL;
?>
