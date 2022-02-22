<table>

  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Description</th>
  </tr>

  <?php
  foreach ($projects as $project) { ?>
    <tr>
      <td><?= $project['id'] ?></td>
      <td><?= $project['name'] ?></td>
      <td><?= $project['description'] ?></td>
      <td><a href="project_page.php?table=project&id=<?= $project['id'] ?>&op=update">🖊️</a></td>
      <td><a href="project_page.php?table=project&id=<?= $project['id'] ?>&op=delete">❌</a></td>
      <td><a href="index.php?table=project&id=<?= $project['id'] ?>&op=insert">➕</a></td>

    </tr>
  <?php } ?>

</table>