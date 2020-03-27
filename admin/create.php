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

   //Hantera data som skickas via formulär
   require_once "db.php";
   if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    //Test
    //print_r($_POST);

    //Skapa en SQL-sats
    $sql = "INSERT INTO blog_posts (title, text)
            VALUES ( :title , :text) ";

            //:name och :tel kallas "parameter markers"= platshållare

    //Prepared statements
    $stmt = $db->prepare($sql);

    //Binda parametrar
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':text', $text);

    //Skicka SQL-satsen till databas-servern
    $stmt->execute();

   endif;
?>  
    <div class="admin_card">
      <h1>Handle your Posts</h1>
      <form class="admin__form" action="index.php" method="POST">
        <div>
          <div class="admin__form__title">
            <input type="text" name="title" placeholder="Title" required>
          </div>
          <div class="admin__form__textArea">
            <textarea name="text" id="text" cols="30" rows="10" placeholder="Text goes here" required></textarea>
          </div>
          <div>
            <input class="button submit" type="submit" value="Lägg till">
          </div>
        </div>
      </form>
    </div>