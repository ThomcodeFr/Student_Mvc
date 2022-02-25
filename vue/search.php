         <section class="researchView">
           <?php
            //rowCount -> compte le nombre de champs dans la requete
            if ($allUsers->rowCount() > 0) { ?>
             <table>
               <tr>
                 <th>Prénom</th>
                 <th>Nom de famille</th>
                 <th>Adresse e-mail</th>
                 <th>Crée le</th>
                 <th>Mise à jour</th>
                 <th>Tag</th>
                 <!-- <th>Projet</th> -->
               </tr>

               <?php
                while ($studentsearch = $allUsers->fetch()) {
                ?>
                 <tr>
                   <td><?= $studentsearch['firstname'] ?></td>
                   <td><?= $studentsearch['lastname'] ?></td>
                   <td><?= $studentsearch['email'] ?></td>
                   <td><?= $studentsearch['created_at'] ?></td>
                   <td><?= $studentsearch['updated_at'] ?></td>
                   <td><?= $studentsearch['name'] ?></td>
                   <!-- <td><?= $studentsearch['name_project'] ?></td> -->
                   <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=update">🖊️</a></td>
                   <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=delete">❌</a></td>
                   <td><a href="index.php?table=student&id=<?= $studentsearch['id'] ?>&op=insert">➕</a></td>
                 </tr>
               <?php
                }
                ?>
             </table>
           <?php
            } else {
              echo "Aucune donnée trouvée dans la Base de donnée";
            }
            ?>
         </section>