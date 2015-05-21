<?php

header('content-type: text/html; charset=utf-8');

$r_values = [];
$c_values = [];


foreach (range(2, 5) as $exp)
{
    foreach ([1.5, 2.2, 3.3, 4.7, 6.8, 10] as $base)
    {
       $val = $base * pow(10, $exp);

       if ($val >= 1000000)
       {
           $name = $val / 1000000 . ' M&Omega;';
       }
       elseif ($val >= 1000)
       {
           $name = $val / 1000 . ' k&Omega;';
       }
       else
       {
           $name = $val . ' &Omega;';
       }

       $r_values[$name] = $val;
    }
}

foreach (range(-4, -9) as $exp)
{
    foreach ([10, 4.7, 2.2, 1] as $base)
    {
       $val = $base * pow(10, $exp);

       if ($val >= 1.e-3)
       {
           $name = $val * 1000 . ' mF';
       }
       elseif ($val >= 1e-6)
       {
           $name = $val * 1000000 . ' &micro;F';
       }
       else
       {
           $name = $val * 1000000000 . ' pF';
       }

       $c_values[$name] = $val;
    }
}


require('view.php');
