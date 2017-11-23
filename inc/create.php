<?php
require 'db_config.php';

  $post = $_POST;

  $sql = "INSERT INTO users (name,secondname,email) VALUES ('".$post['name']."','".$post['secondname']."','".$post['email']."')";

  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM users"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>