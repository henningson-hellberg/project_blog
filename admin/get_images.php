<?php

// if(isset($_GET['id'])) {
//    $id = $_GET['id'];

//    $sql = "SELECT * FROM blog_posts WHERE id = :id";
//    $stmt = $db->prepare($sql);
//    $stmt->bindParam(':id', $id);
//    $stmt->execute();

//    if ($stmt->rowCount() !== 0) {
//       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
//          $activeImgId = $row['image_id'];
//       endwhile;
//    }
// }

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
                     </label>";
       endwhile;
       $radioImgs .= "</div>";
       echo $radioImgs;
      //  echo $activeImgId;
   }

?>

<script>
      radios = document.querySelectorAll('.img-selection__radio')
      images = document.querySelector('.images')
      radios[0].checked = true;

      addImg = document.querySelector('.addImg')
      addImg.addEventListener('click', e => {
        e.preventDefault
          console.log(images)
        images.classList.toggle('hidden')
      })

 </script>


