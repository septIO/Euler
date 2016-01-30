<?php
/**



A positive integer with k (decimal) digits is called balanced if its first ⌈k/2⌉ digits sum to the same value as its last ⌈k/2⌉ digits, where ⌈x⌉, pronounced ceiling of x, is the smallest integer ≥ x, thus ⌈π⌉ = 4 and ⌈5⌉ = 5.
So, for example, all palindromes are balanced, as is 13722.
Let T(n) be the sum of all balanced numbers less than 10n. 
Thus: T(1) = 45, T(2) = 540 and T(5) = 334795890. 
Find T(47) mod 315

*/


$time_start = microtime(true);
// Code here...
echo "<p>" . (microtime(true) - $time_start) . "seconds used</p>";