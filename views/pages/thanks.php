<?php

ob_start();
?>
<main>
  <article>
    <h1>Merci !</h1>
    <p>Nous vous remercions d'avoir complété le questionnaire.</p>
  </article>
  <br>
  <article>
    <h1>Chose promise, chose due !</h1>
    <p>
      Voilà quelques données permettant de vous situer parmi les entreprises ayant le même secteur d'activité que la votre dans la région.<br>
      <br>
    </p>
    <p>
      On commence par le nombre d'entreprises dans votre division APE (qui est la numéro <b><?= $enterprise->division ?></b>) comparé à quelques autres divisions ciblées dans notre enquête:<br>
      <a target="_blank" href="/views/figures/EnterprisesByDivision/All_Workforces.pdf">Nombre d'entreprises (en AURA) par divisions APE</a>
      <br>
      <br>
    </p>
    <p>
      Voilà la répartition des entreprises de votre division APE en fonction du nombre d'établissements qu'elles possèdent en Auvergne-Rhône-Alpes:<br>
      <a target="_blank" href="/views/figures/EnterprisesByOwnedEstablishments/<?= $enterprise->division ?>.pdf">Nombre d'entreprises (en AURA et de la même division APE) par établissements possédés en AURA</a>
      <br>
      <br>
    </p>
    <p>
      Voilà la répartition des établissements de votre division APE en fonction de leur tranche d'effectif:<br>
      <a target="_blank" href="/views/figures/EstablishmentsByWorkforce/<?= $enterprise->division ?>.pdf">Nombre d'établissemrnts (en AURA et de la même division APE) par tranches d'effectifs</a>
      <br>
      <br>
    </p>
    <p>
      Et enfin la localisation des établissements de votre division APE groupés par code postaux. Vous pouvez cliquer que les cercles rouges pour afficher le code postal et le nombre d'établissements qu'il regroupe:<br>
      <a target="_blank" href="/views/maps/<?= $enterprise->division ?>.html">Localisation des établissements (en AURA et de la même division APE)</a>
    </p>

  </article>
</main>
<?php $content = ob_get_clean();

require 'views/template.php';
?>
