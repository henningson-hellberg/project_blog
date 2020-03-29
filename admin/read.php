<script>
function deleteTodo (id) {
  if(confirm("Are you sure yu want to delete this post?")==true) {
    window.location = `delete.php?id=${id}`;
  }
}
</script>

<?php
require_once 'db.php';
$sql = "SELECT * FROM blog_posts";
$stmt = $db->prepare($sql);
$stmt->execute();


echo "<section class='admin_card posts'>";
echo "<h2 class='posts__header'> Posts </h2>";
echo "<table cellpadding='0' cellspacing='0'>";
echo "<tr>
        <th>Id</th>
         <th>Published</th>
        <th>Title</th>
        <th>Text</th>
        <th>Datum</th>
      </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  $id = htmlspecialchars($row['id']);
  $title = htmlspecialchars($row['title']);
  $text = htmlspecialchars($row['text']);
  $date = htmlspecialchars($row['date']);
  $published = htmlspecialchars($row['published']);
  $published == 0 ? $publishBtn = "<button class='button publish unpublished'> <a href='index.php?id=$id&published=1'>No </a></button>" : $publishBtn = "<button class='published button publish'> <a href='index.php?id=$id&published=0'>Yes </a></button>";
 

  echo "<tr class='posts__table'>
          <td>$id</td>
          <td>$publishBtn</td>
          <td>$title</td>
          <td>$text</td>
          <td>$date</td>
          <td>
          <button class='button edit'>
            <a href='index.php?id=$id'>Edit</a>
          </button>
          <button class='button abort' onclick='return deleteTodo(".$id.")'> Delete</button>
          </td>
        </tr>";
endwhile;

echo "</table>";
echo "</section>";
echo "</section>";
