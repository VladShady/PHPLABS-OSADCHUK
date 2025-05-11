<?php

$intVal = 10;

$floatVal = 5.75;

$convertedToInt = (int)$floatVal;
$convertedToFloat = (float)$intVal;

echo "Ціле число: $intVal" . PHP_EOL;
echo "Дробове число: $floatVal" . PHP_EOL;
echo "Дробове $floatVal як ціле: $convertedToInt" . PHP_EOL;
echo "Ціле $intVal як дробове: $convertedToFloat" . PHP_EOL;
?>
