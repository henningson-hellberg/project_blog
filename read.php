<?php

require_once "./admin/db.php";
$sql = "SELECT * FROM blog_posts ORDER BY date DESC";
$stmt = $db->prepare($sql);
$stmt->execute();

$posts = "<section class='posts-section'>";


while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  $title = htmlspecialchars($row['title']);
  $date = htmlspecialchars($row['date']);
  $inputText = htmlspecialchars($row['text']);
  $outputText = str_replace("<br />", "</p>\n<p>", nl2br($inputText));
  $outputText = "<p>" . $outputText . "</p>";


  $posts .="<div class='post'>
             <h2 class='post__title'>$title</h2>
             <span class='post__date'>$date</span>
             $outputText";
              

  $posts .= "</div>";

endwhile;
$posts .= "</section>";
echo $posts;
?>