<?php

$sql = "SELECT * FROM blog_images";
   $stmt = $db->prepare($sql);
   $stmt->execute();

   $radioImgs = "<div>
                     <input type='radio' id='no_img' name='image' value=''>
                     <label for='no_img'>
                        No image
                     </label>
                  </div>";

   if ($stmt->rowCount() !== 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
      $image_id = htmlspecialchars($row['image_id']);
      $image_url = htmlspecialchars($row['image_url']);
  
      $radioImgs .= "<div><input type='radio' id='$image_id' name='image' value='$image_id'>
                     <label for='$image_id'>
                      <img src='$image_url' class='thumbnails'>
                     </label></div>";
       endwhile;
       echo $radioImgs;
   }
