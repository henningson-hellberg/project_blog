<?php

require_once "./admin/db.php";
$sql = "SELECT
        P.title as PostTitle,
        P.date as PostDate,
        P.text as PostText,
        P.embed as PostEmbed,
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

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  $title = htmlspecialchars($row['PostTitle']);
  $date = htmlspecialchars($row['PostDate']);
  $image = htmlspecialchars($row['PostImage']);
  $inputText = htmlspecialchars($row['PostText']);
  $outputText = str_replace("<br />", "</p>\n<p>", nl2br($inputText));
  $outputText = "<p>" . $outputText . "</p>";
  $embed = ($row['PostEmbed']);


  $posts .="<article class='post'>
            <header class='post__header'>
              <h2 class='post__header__title'>$title</h2>
              <span class='post__header__date'>$date</span>
            </header>";
             $image ? $posts.= "<div class='image-wrapper'><img class='image-wrapper__img' src='./admin/$image'></img></div>" :null;
             $posts .= "<div class='post__text'>" . $outputText . "</div>";
             $embed ? $posts.= "<div class='post__embed'>".htmlspecialchars_decode($embed)."</div>" :null;
             $posts .= "<div class='end-line'></div>";
  $posts .= "</article>";

endwhile;
$posts .= "</section>";
echo $posts;
