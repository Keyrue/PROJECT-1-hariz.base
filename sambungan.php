<?php
  $host = 'localhost' ;
  $user = 'root' ;
  $password = '' ;
  $database = 'hariz.base' ;

  $sambungan = mysqli_connect($host, $user, $password , $database)
  or die ('sambungan gagal');
  //echo 'sambungan berjaya';
?>