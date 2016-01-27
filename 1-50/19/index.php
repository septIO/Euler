<?php

/**
  You are given the following information, but you may prefer to do some research for yourself.

    1 Jan 1900 was a Monday.
    Thirty days has September,
    April, June and November.
    All the rest have thirty-one,
    Saving February alone,
    Which has twenty-eight, rain or shine.
    And on leap years, twenty-nine.
    A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.

  How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
*/

$d = new DateTime("1901-01-01");
$c = 0;
while(true){
  if($d->format("D")=='Sun') $c++;
  if($d->format("Y")==2001) break;
  date_add($d, date_interval_create_from_date_string('1 month'));
}
echo $c;
