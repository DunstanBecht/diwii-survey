<?php
header('content-type: text/css; charset: UTF-8');
ob_start('ob_gzhandler');
header('Cache-Control: max-age=3600, must-revalidate');
// Responsive web design:
$switch_width = 3;
$switch_height = 4;
$coefficient = $switch_height/$switch_width;
// Geometry:
$header_height = 9; // vh
$footer_height = 9; // vh
$header_spacing = 6; // vh
$footer_spacing = 6; // vh
$border_width = 0.3; // vh
$border_radius = 1; // vh
$padding = 1.5; // vh
$margin = 1; // vh
$article_max_width = 80; // vw
// Transition:
$transition = 'transition: all .2s ease-in;';
?>
/* ------------------------------------------------------------------ Boxes */

html {
  height: 100%;
  padding: 0;
}

body {
  min-height: 100vh;
  overflow-y: scroll;
  margin: 0;
  padding: 0;
  cursor: default;
  text-align: center;
}

header {
  height: <?= $header_height ?>vh;
  z-index: 100;
  position: fixed;
  width: 100%;
  margin: 0;
  text-align: center;
  display: flex;
}

.page {
  padding-top: <?= $header_spacing + $header_height ?>vh;
  min-height: <?= 100 - $header_spacing - $header_height - $footer_spacing - $footer_height ?>vh;
  padding-bottom: <?= $footer_spacing ?>vh;
}

article, .article {
  z-index: 0;
  vertical-align: top;
  display: inline-block;
  width: <?= $article_max_width/$coefficient ?>vh;
  margin: <?= $margin ?>vh;
  padding: <?= $padding ?>vh;
  border-radius: <?= $border_radius ?>vh;
}

form {
  display: inline-block;
  text-align: center;
  width: 100%;
}

div {
  display: inline-block;
}

footer {
  height: <?= $footer_height ?>vh;
  display: flex;
  z-index: 100;
  position: relative;
}

/* --------------------------------------------------------------- Contents */

h1 {
  text-align: left;
  margin-right: auto;
  margin-left: auto;
  margin-top: 0;
  margin-bottom: 2vh;
}

p {
  z-index: 50;
  text-align: left;
  margin: 0;
  line-height: <?= 3 ?>vw;
}

a, .action {
  padding: 0;
  display: inline;
  <?= $transition ?>
}

a, .active, .action:hover {
  padding: 0;
  display: inline;
  <?= $transition ?>
}

.article-picture {
  width: 100%;
  margin: auto;
  cursor: pointer;
  border-radius: <?= $border_radius - $padding ?>vh;
  position: relative;
  <?= $transition ?>
}

input {
  z-index: 50;
  display: inline-block;
  text-align: center;
  margin: 0;
  padding: 0;
  border: 0 solid;
  <?= $transition ?>
}

input[type=text], input[type=email], input[type=password] {
  width: 98%;
  text-align: left;
  margin: 0 0 0 0;
  padding: 0 1% 0 1%;
  border: <?= $border_width ?>vh solid;
  border-radius: <?= $border_width ?>vh;
}

input[type=checkbox], input[type=radio]{
  height: <?= 1.9 ?>vh;
}

.send {
  text-align: center;
  margin: 0;
  padding: 0 2% 0 2%;
  border-radius: <?= 5*$border_width ?>vh;
  padding: <?= $padding ?>vh;
}

.description {
  display: block;
}

/* ------------------------------------------------------------ Alterations */

.transition {
  <?= $transition ?>
}

.center {
  text-align: center;
}

.right {
  text-align: right;
  text-indent: 0;
}

.left {
  text-align: left;
  text-indent: 0;
}

@media (max-aspect-ratio: <?= $switch_width ?>/<?= $switch_height ?>) {

  article, .article {
    width: <?= $article_max_width ?>vw;
    margin: <?= $margin*$coefficient ?>vw;
    padding: <?= $padding*$coefficient ?>vw;
    border-radius: <?= $border_radius*$coefficient ?>vw;
  }

  h1 {
    margin-bottom: <?= 2*$coefficient ?>vw;
  }

  p {
    line-height: <?= 3*$coefficient ?>vw;
  }

  input[type=text], .send {
    border-width: <?= $border_width*$coefficient ?>vw;
    border-radius: <?= $border_width*$coefficient ?>vw;
  }

  input[type=checkbox], input[type=radio]{
    height: <?= 1.9*$coefficient ?>vw;
  }

  .send {
    border-radius: <?= 5*$border_width*$coefficient ?>vh;
    padding: <?= $padding*$coefficient ?>vh;
  }

}
