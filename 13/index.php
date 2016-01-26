<?php

/**
    Work out the first ten digits of the sum of the following one-hundred 50-digit numbers (input.txt)
*/

$input = explode(PHP_EOL, file_get_contents('input.txt'));
$sum = 0;

foreach($input as $v)$sum += $v;

echo $sum;

echo "<p>Input: <br /><pre>";
print_r($input);
echo "</pre></p>";
