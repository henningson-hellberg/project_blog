<?php

$sql = "SELECT * FROM blog_images";
   $stmt = $db->prepare($sql);
   $stmt->execute();

   $radioImgs = "<div class='images hidden'>
                     
                  <label class='img-selection'>
                     <input class='img-selection__radio' type='radio' id='no_img' name='image' value=''>
                     <div class='img-selection__btn'>Clear</div>
                  </label>
                  ";

   if ($stmt->rowCount() !== 0) {
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
      $image_id = htmlspecialchars($row['image_id']);
       $image_url = htmlspecialchars($row['image_url']);
  
       $radioImgs .= "
                     <label class='img-selection'>
                        <input class='img-selection__radio' type='radio' id='$image_id' name='image' value='$image_id'>
                        <img class='img-selection__btn thumbnails' src='$image_url' class='thumbnails'>
                     </label>
                  
                     
                     ";
       endwhile;
       $radioImgs .= "</div>";
       echo $radioImgs;
   }

?>




