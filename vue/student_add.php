<form action="index.php?table=student&op=insert" method="post">

  <h2>Ajouter l'étudiant</h2>

  <label>Prénom</label> <br />
  <textarea rows="2.5" cols="20" name="firstname" placeholder="Entrez le prénom"><?= $student->firstname ?></textarea><br />

  <label>Nom</label> <br />
  <textarea rows="2.5" cols="20" name="lastname" placeholder="Entrez le prénom"><?= $student->lastname ?></textarea><br />

  <label>Email</label><br />
  <textarea rows="5" cols="20" name="email" placeholder="Ajoutez l'email"><?= $student->email ?></textarea><br />

  <select name="school_year_id" id="school_id">
    <option value="">--Année scolaire--</option>
    <?php foreach ($school_years as $school_year) { ?>
      <option value="<?= $school_year['id'] ?>"> <?= $school_year['id'] ?></option>
    <?php } ?>

  </select>
  <br>
  <br>
  <input type="submit" value="Validez les valeurs" />
</form>