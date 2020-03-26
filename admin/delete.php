<?php
  /*****************************
   * 
   * File name: create.php
   * 
   * Author : Henningson/Hellberg
   * 
   * Date: 2020-03-26
   * 
   * File deletes a row from table
   * in database with id
   * 
   *****************************/

  require 'db.php';

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM blog_posts WHERE id = :id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
  }

  header('Location:index.php');