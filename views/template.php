<?php
$website = 'Aurasmus';
$description = "Sondage à destination des entreprises évoluant vers l'industrie du futur.";
?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Dunstan Becht">
    <meta name="creator" content="Dunstan Becht">
    <meta name="publisher" content="Dunstan Becht">
    <meta name="theme-color" content="#FFFFFF">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="Industrie, Futur, Sondage, AURA">
    <title><?= $website ?></title>
    <link rel="stylesheet" href="/views/style/geometry.php" type="text/css" media="all">
    <link rel="stylesheet" href="/views/style/fonts.php" type="text/css" media="all">
    <link rel="stylesheet" href="/views/style/colors.php" type="text/css" media="all">
    <link rel="icon" href="/views/pictures/favicon.svg" sizes="any" type="image/svg+xml">
    <meta property="og:title" content="<?= $website ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="https://<?= $_SERVER['HTTP_HOST'] ?>/views/pictures/preview.png">
    <meta property="og:url" content="https://<?= $_SERVER['HTTP_HOST'] ?>">
    <meta name="twitter:title" content="<?= $website ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="https://<?= $_SERVER['HTTP_HOST'] ?>/views/pictures/preview.png">
  </head>
  <body>
    <header>
      <div style="margin: auto;">
        <p style="color: white;">
          <b>Vers l'industrie du futur !</b>
        </p>
      </div>
    </header>
    <div class="page">
      <?= $content ?>
    </div>
    <footer>
      <div style="margin: auto;">
        <p style="color: white;">
          <b>Un souci ? Contactez <a href="mailto:dunstan.becht@etu.emse.fr">dunstan.becht@etu.emse.fr</a></b>
        </p>
      </div>
    </footer>
    <script src='/views/js/toggle.js'></script>
  </body>
</html>
