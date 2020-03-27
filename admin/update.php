<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

  
    $stmt = $db->prepare("SELECT * FROM blog_posts WHERE id =:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $title = $row['title'];
        $text = $row['text'];
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $id = htmlspecialchars($_GET['id']);

    $sql = "UPDATE blog_posts
          SET title = :title, text =:text
          WHERE id = :id";
  
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':text', $text);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    header('Location: index.php');
}
?>
<div class="admin_card">
  <h1>Handle your Posts</h1>
  <form class="admin__form" action="#" method="POST">
    <div>
      <div class="admin__form__title">
        <input type="text" name="title" placeholder="Title" value="<?php echo $title ?>">
      </div>
      <div class="admin__form__textArea">
        <textarea name="text" id="text" cols="30" rows="10"><?php echo $text ?></textarea>
      </div>
      <div class="admin__form__buttons">
        <div>
          <input class="button submit" type="submit" value="Update">
        </div>
        <div>
          <button class="button abort">
            <a href="index.php">Abort</a>
          </button>
        </div>
      </div>

    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  </form>
</div>