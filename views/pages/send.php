<?php

ob_start();
?>
<main>
  <article>
    <h1>Envoyer</h1>
    <form id="Form1" method="post">
      <input type="hidden"
             name="send"
             value='send'>
      <br>
    </form>
    <input class="action"
           type="submit"
           form="Form1"
           value="Envoyer">
  </article>
  <br>
  <article>
    <h1>Data</h1>
    <pre><p><?= print_r($data, true) ?></p></pre>
  </article>
  <br>
  <article>
    <pre><p><?= print_r($_SESSION, True) ?></p></pre>
  </article>
</main>
<?php $content = ob_get_clean();

require 'views/template.php';
?>
