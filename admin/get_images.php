<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM blog_posts WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() !== 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
         $activeImgId = $row['image_id'];
        endwhile;
    }
} else {
    $activeImgId = '';
}
      
$sql = "SELECT * FROM blog_images";
$stmt = $db->prepare($sql);
$stmt->execute();

$radioImgs = "<div class='hidden'>                   
               <label class='img-selection'>
                  <input class='img-selection__radio' type='radio' id='no_img' name='image' value=''>
                  <div class='img-selection__btn img-selection__btn1 '>No image</div>
               </label>
               <div class='hidden__images'>
                  ";

if ($stmt->rowCount() !== 0) {
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
      $image_id = htmlspecialchars($row['image_id']);
      $image_url = htmlspecialchars($row['image_url']);
  
      $radioImgs .= "
                  <label class='img-selection'>
                     <input class='img-selection__radio' type='radio' id='$image_id' name='image' value='$image_id'";

      $radioImgs.=  ($image_id == $activeImgId) ? "checked" : null;            
      $radioImgs.= ">
                     <img class='img-selection__btn thumbnails' src='$image_url' class='thumbnails'>
                  </label>";
   endwhile;
}
$radioImgs .= "</div></div>";
echo $radioImgs;
?>

<script>
   radios = document.querySelectorAll('.img-selection__radio')
   images = document.querySelector('.hidden')

   const checkRadios = (radios) => {
      for(let i = 0; i<radios.length; i++ ){
         if(radios[i].checked){
            return true
         }else {
            false
         }
      }
   }
   !checkRadios(radios) ? radios[0].checked = true : null;
      addImg = document.querySelector('.addImg')
      addImg.addEventListener('click', () => {
         images.classList.toggle('hidden')
      })
 </script>


