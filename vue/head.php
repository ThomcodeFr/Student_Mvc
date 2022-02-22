<!doctype html>
<html lang="fr">

<head>
  <title><?= $title ?? 'Base de données : Student' ?></title>
  <link rel="stylesheet" href="vue/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="icon" href="<?= $favicon ?? 'data:;base64,iVBORw0KGgo=' ?>">
</head>

<body>
  <header>
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <h3>BDD - Etudiants</h3>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="index.php?table=student" class="nav-link px-2 link-dark">Liste des étudiants</a></li>
          <li><a href="index.php?table=tag" class="nav-link px-2 link-dark">Liste des Tags</a></li>
          <li><a href="index.php?table=project" class="nav-link px-2 link-dark">Liste des projets</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-dark me-2">Se connecter</button>
          <button type="button" class="btn btn-dark">S'enregistrer</button>
        </div>
      </header>
    </div>