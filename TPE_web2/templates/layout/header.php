
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?=  BASE_URL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title> Catálgo de Videos BBVA</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="home">BBVA Aprendemos Juntos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="video">Videos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="categoria">Categoria</a>
              </li>
            </ul>
          </div>
        
        <?php if (isset($_SESSION["email"])) { ?>
        <span class="navbar-text me-3">
          <?= $_SESSION["email"] ?>
        </span>
        <a class="nav-link" href="<?= BASE_URL ?>logout">
          Cerrar sesión
        </a>
        <?php } else { ?>
        <a class="nav-link" href="<?= BASE_URL ?>login_form">
          Login
        </a>
        <?php } ?>
        </nav>
      </div>
</header>