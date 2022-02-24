<table>

  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Nom du client</th>
    <th>Date de rendu</th>
    <td><a href="project_page.php?table=project&id=&op=insert">➕</a></td>
  </tr>

  <?php
  foreach ($projects as $project1) { ?>
    <tr>
      <td><?= $project1['id'] ?></td>
      <td><?= $project1['name_project'] ?></td>
      <td><?= $project1['description'] ?></td>
      <td><?= $project1['client_name'] ?></td>
      <td><?= $project1['delivery_date'] ?></td>
      <td><a href="project_page.php?table=project&id=<?= $project1['id'] ?>&op=update">🖊️</a></td>
      <td><a href="project_page.php?table=project&id=<?= $project1['id'] ?>&op=delete">❌</a></td>
    </tr>
  <?php } ?>

</table>