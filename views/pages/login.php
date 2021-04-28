<?php

ob_start();
?>
<main>
  <article>
    <h1>Admin</h1>

    <form id="Form1" method="post">
      <input autocomplete="off"
             type="password"
             name="password"
             placeholder="Mot de passe"
             value="">
      <br>
    </form>
    <input class="action"
           type="submit"
           form="Form1"
           value="Connexion">
  </article>
</main>
<?php $content = ob_get_clean();

require 'views/template.php';
?>
