<form action="index.php?table=project&id=<?= $project->id ?>&op=valid" method="post">
  <h2>Entrez vos modifications</h2>
  <label>Nom</label> <br />
  <textarea rows="3" cols="20" name="name" placeholder="Entrez le prénom"><?=$project->name?></textarea><br />
  <label>Description</label><br />
  <textarea rows="3" cols="20" name="description" placeholder="Ajoutez la description"><?=$project->description?></textarea><br />
  <label>Nom du client</label><br />
  <textarea rows="3" cols="20" name="client_name" placeholder="Entrez le nom du client"><?=$project->client_name?></textarea><br />
  <br>
  <input type="submit" value="Validez les valeurs" />
</form>