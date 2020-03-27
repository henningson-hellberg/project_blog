<?php

$sql = "SELECT * FROM blog_images";
   $stmt = $db->prepare($sql);
   $stmt->execute();

   $radioImgs = "";

   if ($stmt->rowCount() !== 0) {
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
      $id = htmlspecialchars($row['id']);
       $image = htmlspecialchars($row['image']);
  
       $radioImgs .= "<div><input class='radio'type='radio' id='$id' name='image' value='$id'>
                     <label for='$id'>
                      <img src='$image' class='thumbnails'>
                     </label></div>";
       endwhile;
       echo $radioImgs;
   }
