<form action="index.php?table=student&id=<?= $student->id ?>&op=valid" method="post">
  <h2>Entrez vos modifications</h2>
  <label>Prénom</label> <br />
  <textarea rows="2.5" cols="20" name="firstname" placeholder="Entrez le prénom"><?= $student->firstname?></textarea><br />
  <label>Nom de famille</label><br />
  <textarea rows="2.5" cols="20" name="lastname" placeholder="Ajoutez le nom de famille"><?= $student->lastname?></textarea><br />
  <label>Adresse e-mail</label><br />
  <textarea rows="2.5" cols="20" name="email" placeholder="Entrez l'adresse email"><?= $student->email?></textarea><br />
  <input type="submit" value="Validez les valeurs" />
</form>