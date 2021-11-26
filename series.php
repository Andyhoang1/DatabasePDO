<?php

   $host = '127.0.0.1:3306';
   $db   = 'netland';
   $user = 'root';
   $pass = '';
   $charset = 'utf8mb4';
   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $PDO = new PDO($dsn, $user, $pass);



   $id = $_GET["id"];

   $query = "SELECT * FROM media WHERE id = $id";

   $yes = $PDO->query($query);

   $yes = $yes->fetch(PDO::FETCH_ASSOC);

foreach ($yes as $naam => $detail) {
    echo $naam . " ";
    echo $detail;
    echo "<br>";
}

?>
