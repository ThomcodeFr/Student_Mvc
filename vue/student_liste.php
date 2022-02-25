<table>

  <tr>
    <th>Prénom</th>
    <th>Nom de famille</th>
    <th>Adresse e-mail</th>
    <th>Année Scolaire</th>
    <th>Crée le</th>
    <th>Mise à jour</th>
    <td><a href="index.php?table=student&id=&op=insert">➕</a></td>
  </tr>

  <?php
  foreach ($students as $student1) { ?>
    <tr>
      <td><?= $student1['firstname'] ?></td>
      <td><?= $student1['lastname'] ?></td>
      <td><?= $student1['email'] ?></td>
      <td><?= $student1['school_year_id'] ?></td>
      <td><?= $student1['created_at'] ?></td>
      <td><?= $student1['updated_at'] ?></td>
      <td><a href="index.php?table=student&id=<?= $student1['id'] ?>&op=update">🖊️</a></td>
      <td><a href="index.php?table=student&id=<?= $student1['id'] ?>&op=delete">❌</a></td>
    </tr>


    <tr>
      <td colspan="8" id="tag-style">
      <?php
      $studentags = $student->tags($student1['id']);
      foreach ($studentags as $studentag) {
        echo "#" . $studentag['name'] . " ";
      }
    }
      ?>


</table>