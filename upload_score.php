<?php
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $user = $_POST['username'];
    $score = $_POST['score'];
  }
  $errors = []; // Hibák tárolása
      try {
          $sql = "INSERT INTO `Scoreboard`(`username`,`score`) VALUES (?,?)";
          $conn->prepare($sql)->execute([$user,$score]);
      }catch(PDOException $e) {
        echo(json_encode(array('message' => $e->getMessage(), 'code' => 1337)));
      }
?>
