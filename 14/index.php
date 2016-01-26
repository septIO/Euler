<?php

/**
  The following iterative sequence is defined for the set of positive integers:

  n → n/2 (n is even)
  n → 3n + 1 (n is odd)

  Using the rule above and starting with 13, we generate the following sequence:

  13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1
  It can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.

  Which starting number, under one million, produces the longest chain?

  NOTE: Once the chain starts the terms are allowed to go above one million.
*/
$highest = 0;
for( $i = 2; $i<1000000; $i++ ) {
  $t = 1;
  $e = $i;
  //echo $i;
  while($e!=1){
    $e = ($e&1)?$e*3+1:$e/2;
    //echo ' → ' . $e;
    $highest = $i > $highest ? $i : $highest;
    $t++;
  }
  //echo ' Most steps: ' . $highest;
  //echo "<br />";
}

echo $highest;