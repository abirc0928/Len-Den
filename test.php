<?php
$date = "2022-09-30";
echo $date;
echo "\n";
echo date('Y-m-d', strtotime($date. ' + 7 days')); 
?>