<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light <?= !empty($_SESSION) ? 'bg-info' : 'bg-danger' ?> ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php if(empty($_SESSION)) : ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=admin">Se connecter</a>
          </li>
          <?php else : ?>
            <li class="nav-item">
            <a class="nav-link" href="index.php?action=logout">Se deconnecter</a>
          </li>
        <?php endif; ?>
        <?php if(!empty($_SESSION)) : ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=espaceAdmin">Espace admin</a>
          </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <?php foreach($results as $categorie) : ?>
              <li><a class="dropdown-item" href="index.php?action=archivePost&id=<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></a></li>
            <?php endforeach; ?> -->
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="POST" action="index.php?action=searchPost">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    
    <?= $content ?>
</body>
</html>