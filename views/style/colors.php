<?php
header('content-type: text/css; charset: UTF-8');
ob_start('ob_gzhandler');
header('Cache-Control: max-age=3600, must-revalidate');
// Colors:
$blue = "rgb(42, 78, 150)";
$orange = 'rgb(255, 158, 85)';
$red = 'red';
$green = 'green';
$background = "rgba(42, 78, 150, 0.6)";
?>
/* ------------------------------------------------------------------ Boxes */

body {
  background: url("/views/pictures/background.svg") no-repeat center fixed #FFFFFF;
  background-size: cover;
}

header {
  background-color: <?= $background ?>;
}

article, .article {
  background-color: rgba(255, 255, 255, 0.9);
}

footer {
  background-color: <?= $background ?>;
}

/* --------------------------------------------------------------- Contents */

::selection {
  background: <?= $orange ?>;
  color: white;
}

::-moz-selection {
  background: <?= $orange ?>;
  color: white;
}

h1 {
  color: <?= $orange ?>;
}

p {
  color: <?= $blue ?>;
}

input {
  color: <?= $blue ?>;
  background: transparent;
}

a, .action {
  user-select: none;
  color: <?= $orange ?>;
}

a:hover, .active, .action:hover {
  color: <?= $green ?>;
}

input[type=text], input[type=email], input[type=password] {
  color: <?= $blue ?>;
  border-color: <?= $blue ?>;
}

input[type=text]:hover, input[type=email]:hover, input[type=password]:hover {
  border-color: <?= $blue ?>;
}

input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
  border-color: <?= $blue ?>;
}

.description {
  color: grey;
  margin-left: 3%;
}

.send {
  color: white;
  background: <?= $green ?>;
  border-color: <?= $green ?>;
}

.send:hover {
  background: <?= $orange ?>;
  border-color: <?= $orange ?>;
}

/* ------------------------------------------------------------ Alterations */

.green {
  color: <?= $green ?>;
}

.orange {
  color: <?= $orange ?>;
}

.blue {
  color: <?= $blue ?>;
}
