<?php
/**


Given is the function f(x) = ⌊230.403243784-x2⌋ × 10-9 ( ⌊ ⌋ is the floor-function),
the sequence un is defined by u0 = -1 and un+1 = f(un).

Find un + un+1 for n = 1012.
Give your answer with 9 digits after the decimal point.

*/


$time_start = microtime(true);
// Code here...
echo "<p>" . (microtime(true) - $time_start) . "seconds used</p>";