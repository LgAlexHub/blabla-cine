<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/blabla-cine/assets/favicon.ico">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous'>
    <title><?= $title ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/blabla-cine">
        <img src="/blabla-cine/assets/favicon.ico" class="mb-1" width="40" height="40" alt="">
        <?= $_ENV['APP_NAME'] ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="/blabla-cine">Populaire</a>
        </li>
        </ul>
        <form action="/blabla-cine/recherche/" method="get" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" name="query" placeholder="titre de film..." aria-label="Search">
            <input class="btn btn-outline-success my-2 my-sm-0" value="Rechercher" type="submit">
        </form>
    </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</body>
</html>