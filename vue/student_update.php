<h2>Entrez vos modifications</h2>

<form action="index.php?table=student&id=<?= $student->id ?>&op=valid" method="post">
  <label>Prénom</label> <br />
  <textarea rows="2.5" cols="20" name="firstname" placeholder="Entrez le prénom"><?= $student->firstname ?></textarea><br />
  <label>Nom de famille</label><br />
  <textarea rows="2.5" cols="20" name="lastname" placeholder="Ajoutez le nom de famille"><?= $student->lastname ?></textarea><br />
  <label>Adresse e-mail</label><br />
  <textarea rows="2.5" cols="20" name="email" placeholder="Entrez l'adresse email"><?= $student->email ?></textarea><br />
  <br>
  <select name="school_year_id" id="school_id">
    <option value="">--Année scolaire--</option>
    <?php foreach ($school_years as $school_year1) { ?>
      <option value="<?= $school_year1['id'] ?>"> <?= $school_year1['id'] ?></option>
    <?php } ?>
  </select>
  <br>
  <br>
  <input type="submit" value="Validez les valeurs" />
</form>