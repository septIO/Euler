<?php
/**


Let $\varphi(n)$ be Euler's totient function.
Let $f(n)=(\sum_{i=1}^{n}\varphi(n^i)) \text{ mod } (n+1)$.
Let $g(n)=\sum_{i=1}^{n} f(i)$.
$g(100)=2007$.


Find $g(5 \times 10^8)$.



*/


$time_start = microtime(true);
// Code here...
echo "<p>" . (microtime(true) - $time_start) . "seconds used</p>";