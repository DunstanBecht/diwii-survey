<?php

ob_start(); ?>
<article>
  <h1>Erreur</h1>
  <p class="red"><?php echo $error_message; ?></p>
</article>
<?php $content = ob_get_clean();

require 'views/template.php';
?>
