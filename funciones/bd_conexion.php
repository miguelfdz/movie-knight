<?php
  $user = 'root';
  $password = 'root';
  $db = 'movies_movieknight';
  $host = 'localhost';

  $conn = new mysqli($host, $user, $password, $db);

   if ($conn->connect_error) {
     echo $error -> $conn->connect_error;
   }
?>
