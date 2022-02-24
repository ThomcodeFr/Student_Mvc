 <!--     Recherche sur mysql      -->
 <?php
  $allUsers = $pdo->query('SELECT * FROM student ORDER BY id DESC ');
  if (isset($_GET['research']) and !empty($_GET['research'])) {
    $search = htmlspecialchars($_GET['research']);
    $allUsers = $pdo->query('SELECT * FROM student WHERE lastname LIKE "%' . $search . '%" ORDER BY id DESC');
  }
  ?>

 <section class="researchView">
   <?php
    if (isset($_GET['research'])) {
      if ($allUsers->rowCount() > 0) { //rowCount -> compte le nombre de champs dans la requete
        while ($studentsearch = $allUsers->fetch()) {
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
        echo "Aucun utilisateur trouvé dans la BDD";
      }
    }
    ?>
 </section>