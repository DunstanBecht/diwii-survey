<?php
header('content-type: text/css; charset: UTF-8');
ob_start('ob_gzhandler');
header('Cache-Control: max-age=3600, must-revalidate');
// Responsive web design:
$switch_width = 3;
$switch_height = 4;
$coefficient = $switch_height/$switch_width;
// Font sizes:
$font_size_1 = 2;
$font_size_2 = 2;
?>
@font-face {
  font-family: "Text";
  src: url("/views/fonts/text.ttf") format("truetype");
}

/* ------------------------------------------------------------------ Boxes */

html {
  font-size: 0;
}

body {
  font-size: 0;
}

/* --------------------------------------------------------------- Contents */

h1 {
  font-family: Unity, Text;
  font-size: <?= $font_size_1 ?>vh;
}

p {
  font-family: Text, Arial;
  text-decoration: none;
  font-size: <?= $font_size_2 ?>vh;
  line-height: 3vh;
}

a {
  text-decoration: none;
}

input {
  font-size: <?= $font_size_1 ?>vh;
  font-family: Unity, Text;
  text-decoration: none;
  cursor: pointer;
  outline: none;
}

.action {
  user-select: none;
  font-family: Unity, Text;
  font-size: <?= $font_size_1 ?>vh;
}

.active, .action:hover {
  user-select: none;
  font-family: Unity, Text;
  font-size: <?= $font_size_1 ?>vh;
}

input[type=text], input[type=email], input[type=password] {
  cursor: text;
}

.send {
  font-weight: bold;
}

@media (max-aspect-ratio: <?= $switch_width ?>/<?= $switch_height ?>) {

  h1 {
    font-size: <?= $font_size_1*$coefficient ?>vw;
  }

  p {
    font-size: <?= $font_size_2*$coefficient ?>vw;
  }

  .action {
    font-size: <?= $font_size_1*$coefficient ?>vw;
  }

  .active, .action:hover {
    font-size: <?= $font_size_1*$coefficient ?>vw;
  }

}
