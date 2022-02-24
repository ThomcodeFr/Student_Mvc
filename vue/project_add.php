<form action="index.php?table=project&op=insert" method="post">

  <h2>Ajouter votre project</h2>

  <label>Nom du projet</label> <br />
  <textarea rows="2.5" cols="20" name="name_project" placeholder="Entrez le nom du projet"><?= $project->name_project ?></textarea><br />

  <label>Description</label><br />
  <textarea rows="5" cols="20" name="description" placeholder="Ajoutez une description"><?= $project->description ?></textarea><br />

  <label>Nom du client</label><br />
  <textarea rows="5" cols="20" name="client_name" placeholder="Ajoutez le nom du client"><?= $project->client_name ?></textarea><br />

  <label>Date de rendu</label><br />
  <textarea rows="5" cols="20" name=" delivery_date" placeholder="Ajoutez la date au format AAAA/MM/JJ"><?= $project->delivery_date ?></textarea><br />
  <br>
  <input type="submit" value="Validez les valeurs" />

</form>