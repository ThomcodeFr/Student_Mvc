<form action="index.php?table=tag&op=insert" method="post">

  <h2>Ajouter votre tag</h2>

  <label>Name</label> <br />
  <textarea rows="2.5" cols="20" name="nom" placeholder="Entrez le nom"><?= $tag->name ?></textarea><br />

  <label>Description</label><br />
  <textarea rows="5" cols="20" name="description" placeholder="Ajoutez une description"><?= $tag->description ?></textarea><br />
  <br>
  <input type="submit" value="Validez les valeurs" />

</form>