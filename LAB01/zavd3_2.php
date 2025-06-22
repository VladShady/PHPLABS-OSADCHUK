<?php
$year = 2024;
$isLeap = date('L', mktime(0, 0, 0, 1, 1, $year));

if ($isLeap) {
    echo "Рік $year є високосним.";
} else {
    echo "Рік $year не є високосним.";
}
?>
