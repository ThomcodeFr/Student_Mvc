<table>

  <tr>
    <th>Prénom</th>
    <th>Nom de famille</th>
    <th>Adresse e-mail</th>
    <th>Crée le</th>
    <th>Mise à jour</th>
  </tr>

  <?php
  foreach ($students as $student) { ?>
    <tr>
      <td><?= $student['firstname'] ?></td>
      <td><?= $student['lastname'] ?></td>
      <td><?= $student['email'] ?></td>
      <td><?= $student['created_at'] ?></td>
      <td><?= $student['updated_at'] ?></td>
      <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=update">🖊️</a></td>
      <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=delete">❌</a></td>
      <td><a href="index.php?table=student&id=<?= $student['id'] ?>&op=insert">➕</a></td>

    </tr>
  <?php } ?>

</table>