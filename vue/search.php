         <section class="researchView">
   <?php
      if ($allUsers->rowCount() > 0) { //rowCount -> compte le nombre de champs dans la requete
        while ($studentsearch = $allUsers->fetch())
        {
          ?>

        <section id="container">
           <table>
             <td><?= $studentsearch['firstname'] ?></td>
             <td><?= $studentsearch['lastname'] ?></td>
             <td><?= $studentsearch['email'] ?></td>
             <td><?= $studentsearch['created_at'] ?></td>
             <td><?= $studentsearch['updated_at'] ?></td>
             <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=update">🖊️</a></td>
             <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=delete">❌</a></td>
             <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=insert">➕</a></td>
           </table>
         </section>
   <?php
        }
      } else {
        echo "Aucune donnée trouvée dans la Base de donnée";
      }
    ?>
 </section>