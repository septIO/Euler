<?php
/**


A row of n squares contains a frog in the leftmost square. By successive jumps the frog goes to the rightmost square and then back to the leftmost square. On the outward trip he jumps one, two or three squares to the right, and on the homeward trip he jumps to the left in a similar manner. He cannot jump outside the squares. He repeats the round-trip travel m times.

Let F(m, n) be the number of the ways the frog can travel so that at most one square remains unvisited.
For example, F(1, 3) = 4, F(1, 4) = 15, F(1, 5) = 46, F(2, 3) = 16 and F(2, 100) mod 109 = 429619151.

Find the last 9 digits of F(10, 1012).

*/


$time_start = microtime(true);
// Code here...
echo "<p>" . (microtime(true) - $time_start) . "seconds used</p>";