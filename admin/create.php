<?php
/*****************************
   *
   * File name: create.php
   *
   * Author : Henningson/Hellberg
   *
   * Date: 2020-03-26
   *
   * File contains a form that sends
   * data to database
   *
   *****************************/

   
   require_once "db.php";

  //  $sql = "SELECT * FROM blog_images";
  //  $stmt = $db->prepare($sql);
  //  $stmt->execute();

  //  $radioImgs = "";

  //  if ($stmt->rowCount() !== 0) {
  //   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  //     $id = htmlspecialchars($row['id']);
  //     $image = htmlspecialchars($row['image']);
  
  //     $radioImgs .= "<input type='radio' id='$id' name='image' value='$id'>
  //                    <label for='$id'>
  //                     <img src='$image' class='thumbnails'>
  //                    </label>";
  //    endwhile;
  // }


   //Hantera data som skickas via formulär
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    //Test
    //print_r($_POST);

    //Skapa en SQL-sats
    $sql = "INSERT INTO blog_posts (title, image_id, text )
            VALUES ( :title , :image_id , :text) ";

            //:name och :tel kallas "parameter markers"= platshållare

    //Prepared statements
    $stmt = $db->prepare($sql);

    //Binda parametrar
    $title = htmlspecialchars($_POST['title']);
    $image_id = htmlspecialchars($_POST['image']);
    $text = htmlspecialchars($_POST['text']);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image_id', $image_id);
    $stmt->bindParam(':text', $text);

    //Skicka SQL-satsen till databas-servern
    $stmt->execute();

   endif;
?>  
    <div class="admin_card">
      <h1>halde</h1>
      <form class="admin__form" action="index.php" method="POST">
        <div>
          <div class="admin__form__title">
            <input type="text" name="title" placeholder="Title" required>
          </div>
          <div class="admin__form__image">
            <?php require_once "get_images.php";?>
          </div>
          <!-- <button class="button add-img">Add image</button>
          <input type="hidden" name="chosen-img"> -->
          <div class="admin__form__textArea">
            <textarea name="text" id="text" cols="30" rows="10" placeholder="Text goes here" required></textarea>
          </div>
          <div>
            <input class="button submit" type="submit" value="Lägg till">
          </div>
        </div>
      </form>
    </div>