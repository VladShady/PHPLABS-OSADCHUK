<?php
$numbers = [];

for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}

echo "Згенерований масив: " . implode(", ", $numbers) . PHP_EOL;
echo "Мінімальне значення: " . min($numbers) . PHP_EOL;
echo "Максимальне значення: " . max($numbers) . PHP_EOL;
?>
