<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "len-den";
 
 $con = mysqli_connect($server,$username,$password,$dbname);
 if(!$con){
   die("error " . mysqli_connect_error(). "no_connetion") ;
   
 }
 
 ?>