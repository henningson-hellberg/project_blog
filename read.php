<?php

require_once "./admin/db.php";
$sql = "SELECT
        P.title as PostTitle,
        P.date as PostDate,
        P.text as PostText,
        I.image_url as PostImage
        FROM
        blog_posts AS P
        LEFT JOIN
        blog_images AS I
        ON
        P.image_id = I.image_id
        ";
$stmt = $db->prepare($sql);
$stmt->execute();

$posts = "<section class='posts-section'>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  $title = htmlspecialchars($row['PostTitle']);
  $date = htmlspecialchars($row['PostDate']);
  $image = htmlspecialchars($row['PostImage']);
  $inputText = htmlspecialchars($row['PostText']);
  $outputText = str_replace("<br />", "</p>\n<p>", nl2br($inputText));
  $outputText = "<p>" . $outputText . "</p>";
  echo $image;
  echo "<br />";


  $posts .="<div class='post'>
             <h2 class='post__title'>$title</h2>";
             $image ? $posts.= "<div class='post__img'><img src='./admin/$image'></img></div>" :null;
             $posts .="<span class='post__date'>$date</span>
             $outputText";
              

  $posts .= "</div>";

endwhile;
$posts .= "</section>";
echo $posts;
