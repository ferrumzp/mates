<?php
require 'db_config.php';


  $id  = $_POST["id"];
  $post = $_POST;

  $sql = "UPDATE users SET name = '".$post['name']."',secondname = '".$post['secondname']."','".$post['email']."' WHERE id = '".$id."'";

  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM users WHERE id = '".$id."'"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>