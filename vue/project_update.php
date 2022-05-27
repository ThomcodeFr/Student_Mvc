<form action="index.php?table=project&id=<?= $project->id ?>&op=valid" method="post">
  <h2>Entrez vos modifications</h2>
  <label>Nom</label> <br />
  <textarea rows="3" cols="20" name="name_project" placeholder="Entrez le prénom"><?= $project->name_project ?></textarea><br />
  <label>Description</label><br />
  <textarea rows="3" cols="20" name="description" placeholder="Ajoutez la description"><?= $project->description ?></textarea><br />
  <label>Nom du client</label><br />
  <textarea rows="3" cols="20" name="client_name" placeholder="Entrez le nom du client"><?= $project->client_name ?></textarea><br />
  <br>
  <label>Date de rendu</label><br />
  <textarea rows="5" cols="20" name=" delivery_date" placeholder="Ajoutez la date au format AAAA/MM/JJ"><?= $project->delivery_date ?></textarea><br />
  <br>
  <input type="submit" value="Validez les valeurs" />
</form>