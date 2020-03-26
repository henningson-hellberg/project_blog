<script>
function deleteTodo (id) {
  if(confirm("Are you sure you want to delete this post?")==true) {
    window.location = `delete.php?id=${id}`;
  }
} 
</script>

<?php
require_once 'db.php';
$sql = "SELECT * FROM blog_posts";
$stmt = $db->prepare($sql);
$stmt->execute();

echo "<table class='posts'>";
echo "<tr>
        <th>Id<th>
        <th>Title<th>
        <th>Text<th>
        <th>Datum<th>
      <tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  $id = htmlspecialchars($row['id']);
  $title = htmlspecialchars($row['title']);
  $text = htmlspecialchars($row['text']);
  $date = htmlspecialchars($row['date']);

  echo "<tr>
          <td>$id<td>
          <td>$title<td>
          <td>$text<td>
          <td>$date<td>
          <td>
          <button>
          <a href=''>Update</a>
          </button>
          <input type='button' value='Delete' onclick='return deleteTodo(".$id.")'/>
          </td>
        <tr>";
endwhile;

echo "</table>";