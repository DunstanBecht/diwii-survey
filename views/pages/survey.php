<?php

$count = 0;

function add_checkbox($name, $label, $description="") {
  global $count, $enterprise;
  ob_start(); ?>
  <input type="hidden" name="<?= $name ?>" value="0">
  <input type="checkbox" id="answer<?= $count ?>" name="<?= $name ?>" value="1" <?= ($enterprise->$name=='1') ? "checked" : "" ?>>
  <label for="answer<?= $count ?>"><?= $label ?></label>
  <?php if ($description!="") { ?>
    <span class='action'
          onclick="toggle('toggle<?= $count ?>');"
          style="cursor: pointer; width: 100%;">
      [+]
    </span>
  <?php } ?><br>
  <span id="toggle<?= $count ?>" class="description transition" style="display: none; text-align: justify;">
    <?= $description ?><br>
    <br>
  </span>
  <?php $content = ob_get_clean();
  $count = $count + 1;
  return $content;
}

function add_text($name, $placeholder, $length) {
  global $enterprise;
  ob_start(); ?>
  <input type="text" name="<?= $name ?>" value="<?= (isset($enterprise->$name)) ? $enterprise->$name : "" ?>" placeholder="<?= $placeholder ?>" maxlength="<?= $length ?>">
  <br>
  <?php $content = ob_get_clean();
  return $content;
}

function add_email($name, $placeholder) {
  global $enterprise;
  ob_start(); ?>
  <input type="email" name="<?= $name ?>" value="<?= (isset($enterprise->$name)) ? $enterprise->$name : "" ?>" placeholder="<?= $placeholder ?>" maxlength="256">
  <br>
  <?php $content = ob_get_clean();
  return $content;
}

function add_radio($name, $label, $value) {
  global $count, $enterprise;
  ob_start(); ?>
  <input type="radio" id="answer<?= $count ?>" name="<?= $name ?>" value="<?= $value ?>" <?= ($enterprise->$name==$value) ? "checked" : "" ?>>
  <label for="answer<?= $count ?>"><?= $label ?></label>
  <br>
  <?php $content = ob_get_clean();
  $count = $count + 1;
  return $content;
}
ob_start();
?>
<main>
  <article>
    <h1><?= $enterprise->name ?>, où en êtes-vous dans la progression vers l'industrie du futur ?</h1>
    <p style="text-align: justify;">
      Vous aurez accès à la fin de ce questionnaire à des informations personnalisées relatives à votre secteur d'activité que nous avons obtenus après un travail de traitement de donnnées récentes issues de l'INSEE.<br>
      <br>
    </p>
    <a target="_blank" href="https://en3s.fr"><img style="width:21%;" src="/views/pictures/EN3S.svg" alt="EN3S"></a>
    <a target="_blank" href="https://www.mines-stetienne.fr"><img style="width:19.5%; margin: 0 10% 0 10%;" src="/views/pictures/Mines.svg" alt="Mines"></a>
    <a target="_blank" href="https://www.em-lyon.com"><img style="width:16%;" src="/views/pictures/Emlyon.svg" alt="EM Lyon"></a>
    <p style="text-align: justify;">
      <br>
      Ce questionnaire vous est proposé par le projet <a target="_blank" href="https://www.agera.asso.fr/actualites/lancement-de-la-saison-3-daurasmus">AURAMUS</a> et les étudiants de l'École des Mines, de l’EN3S et de l'EM Lyon.
    </p>
  </article>
  <br>
  <form id="Form1" method="post" style="text-align:left;">
    <article>
      <p class="center">
        (Cochez pour répondre <b>oui</b>)<br>
        <br>
      </p>

      <input type="hidden" name="is_answered" value="is_answered">
      <h1>Avez-vous déjà entendu parler de :</h1>
      <p>
        <?= add_checkbox('answer1a', 'Industrie 4.0', 'Ce concept est mis en évidence pour la première fois à la Foire de Hanovre en 2011. Il permettait de définir toutes les nouvelles technologies numériques qui étaient en train d’émerger ainsi que leurs interconnexions ou leurs possibilités de communiquer entre elles. Le terme 4.0 fait référence à la 4e révolution industrielle : Internet des objets, intelligence artificielle, Cloud, Big Data, jumeaux numériques...') ?>
        <?= add_checkbox('answer1b', 'Industrie du futur', 'Notre définition de l’industrie du futur est plus générale. Elle ne se focalise pas sur les outils mais sur leur utilité et leur intégration au sein de l’usine de production. Usine dans laquelle l’humain reste l’élément central...') ?>
        <?= add_checkbox('answer1c', 'Campus région du numérique', "Le <a target='_blank' href='https://campusnumerique.auvergnerhonealpes.fr'>Campus Région Du Numérique</a> est un lieu physique de formation et d’échanges et l’outil de tout un écosystème. Catalyseur d’innovations, c’est aussi une offre de services indispensables à l’emploi et à la transformation numérique des entreprises et des industries.") ?>
        <?= add_checkbox('answer1d', 'Plateforme DIWII', "<a target='_blank' href='https://campusnumerique.auvergnerhonealpes.fr/innover/diwii-digital-intelligence-way-for-industry-institute'>DIWII</a>, composante essentielle de l'Usine du Campus Région du numérique, est un démonstrateur échelle 1 de l'industrie du Futur pour former, tester, expérimenter, transférer les résultats de la recherche et accompagner toutes les entreprises dans leur transformation.") ?>
        <br>
      </p>

      <h1>Pour votre entreprise, une nouvelle technologie aurait vocation à :</h1>
      <p>
        <?= add_checkbox('answer2a', "Réduire les coûts") ?>
        <?= add_checkbox('answer2b', "Améliorer la communication") ?>
        <?= add_checkbox('answer2c', "S'orienter vers de nouveaux marchés") ?>
        <?= add_checkbox('answer2d', "Personnaliser l'offre (mass customization)") ?>
        <?= add_checkbox('answer2e', "Participer à la transition écologique") ?>
        <?= add_checkbox('answer2f', "Améliorer l'efficicence des processus de production") ?>
        <?= add_checkbox('answer2g', "Augmenter les volumes de production") ?>
        <?= add_checkbox('answer2h', "Relocaliser ma fabrication") ?>
        <?= add_text('answer2i', "Précisez si autre", 300) ?>
        <br>
      </p>

      <h1>Avez-vous déjà implémenté de nouveaux concepts ou technologies dans :</h1>
      <p>
        <?= add_checkbox('answer3a', "Objets connectés et Internet industriel", "Produits connectés<br>Technologies de connexion des machines<br>Infrastructure d'échange de données") ?>
        <?= add_checkbox('answer3b', "Technologies de production avancées", "Nouveaux matériaux et matériaux intelligents<br>Procédés de fabrication innovants<br>Procédés éco-responsables<br>Robotique avancée et machines intelligentes<br>Automatisation, machines et robots industriels<br>Composants intelligents<br>Surveillance et captation multi-physique<br>Contrôle Commande") ?>
        <?= add_checkbox('answer3c', "Nouvelle approche de l'Homme au travail", "Organisation et management innovants<br>Applications mobiles et sociales<br>Qualité de Vie au Travail (QVT)<br>Assistance physique<br>Assistance cognitive<br>Conduite du changement") ?>
        <?= add_checkbox('answer3d', "Usines et lignes/îlots connectés et optimisés", "La virtualisation pour l'optimisation du système de production<br>Intelligence opérationnelle : traitement en temps réel des données<br>Management des opérations industrielles<br>Ingénierie numérique des produits et des procédés<br>Contrôle produit") ?>
        <?= add_checkbox('answer3e', "Relations clients/fournisseurs intégrées", "Digitalisation de la chaîne de valeur<br>Innovation et production collaborative<br>Gestion du cycle de vie des produits étendue aux services (PLM, SLM)") ?>
        <?= add_checkbox('answer3f', "Nouveaux modèles économiques et sociétaux", "Stratégie et alliances<br>Insertion dans la collectivité, bien commun<br>Nouveau business model<br>Entreprise étendue et agile<br>Entreprise stratège<br>Capital immatériel") ?>
        <br>
      </p>

      <h1>Quelle(s) thèmatique(s) vous intéresse(nt) ?</h1>
      <p>
        <?= add_checkbox('answer4a', "Objets connectés et Internet industriel", "Produits connectés<br>Technologies de connexion des machines<br>Infrastructure d'échange de données") ?>
        <?= add_checkbox('answer4b', "Technologies de production avancées", "Nouveaux matériaux et matériaux intelligents<br>Procédés de fabrication innovants<br>Procédés éco-responsables<br>Robotique avancée et machines intelligentes<br>Automatisation, machines et robots industriels<br>Composants intelligents<br>Surveillance et captation multi-physique<br>Contrôle Commande") ?>
        <?= add_checkbox('answer4c', "Nouvelle approche de l'Homme au travail", "Organisation et management innovants<br>Applications mobiles et sociales<br>Qualité de Vie au Travail (QVT)<br>Assistance physique<br>Assistance cognitive<br>Conduite du changement") ?>
        <?= add_checkbox('answer4d', "Usines et lignes/îlots connectés et optimisés", "La virtualisation pour l'optimisation du système de production<br>Intelligence opérationnelle : traitement en temps réel des données<br>Management des opérations industrielles<br>Ingénierie numérique des produits et des procédés<br>Contrôle produit") ?>
        <?= add_checkbox('answer4e', "Relations clients/fournisseurs intégrées", "Digitalisation de la chaîne de valeur<br>Innovation et production collaborative<br>Gestion du cycle de vie des produits étendue aux services (PLM, SLM)") ?>
        <?= add_checkbox('answer4f', "Nouveaux modèles économiques et sociétaux", "Stratégie et alliances<br>Insertion dans la collectivité, bien commun<br>Nouveau business model<br>Entreprise étendue et agile<br>Entreprise stratège<br>Capital immatériel") ?>
        <br>
      </p>

      <h1>Selon vous, quelle part représente l'humain dans le processus de mise en place d'une nouvelle technologie?</h1>
      <p>
        <?= add_radio("answer5", "0% à 20%", 'a') ?>
        <?= add_radio("answer5", "20% à 40%", 'b') ?>
        <?= add_radio("answer5", "40% à 60%", 'c') ?>
        <?= add_radio("answer5", "60% à 80%", 'd') ?>
        <?= add_radio("answer5", "80% à 100%", 'e') ?>
        <br>
      </p>

      <h1>Avez-vous déjà fait appel à des financements régionaux pour l'aide à l'investissement ?</h1>
      <p>
        <?= add_radio("answer6a", "Oui", '1') ?>
        <?= add_radio("answer6a", "Non", '0') ?>
        <?= add_checkbox("answer6b", "Je souhaiterais de l'information") ?>
        <br>
      </p>

      <h1>En 1 mot, dites ce que l'industrie du futur est pour vous.</h1>
      <p>
        <?= add_text('answer7', "Laissez parler votre imagination ou vos besoins...", 100) ?>
      </p>

    </article>
    <br>
    <article>
      <h1>Derniers clics !</h1>
      <p>
        Souhaiteriez-vous être recontacté par un spécialiste de DIWII pour vous accompagner et vous conseiller dans l'évolution de votre entreprise ?
        <br>
        <?= add_radio("need", "Non", '0') ?>
        <?= add_radio("need", "Oui, à l'adresse mail suivante :", '1') ?>
        <?= add_email('mail', "Votre adresse mail", 256) ?>
        <br>
        En soumettant ce questionnaire j'accepte le RGPD.
        <span class='action'
              onclick="toggle('toggleTerms');"
              style="cursor: pointer; width: 100%;">
          [+]
        </span><br>
        <span id="toggleTerms" class="description transition" style="display: none; text-align: justify;">
          J'accepte que les informations recueillies sur ce formulaire soient enregistrées dans un fichier informatisé géré par l’Ecole des Mines, pour une analyse statistique, dans le cadre du projet inter écoles AURASMUS-DIWII.<br>
          Les données collectées seront communiquées aux seuls destinataires suivants : l’Ecole des Mines, l’EM Lyon, l’EN3S et DIWII.<br>
          Les données seront conservées pendant 1 an.<br>
          Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données en écrivant à bruno.chavagneux@emse.fr<br>
        </span>
      </p>
      <p class="center">
        <br>
        <input class="send" type="submit" form="Form1" value="Envoyer le questionnaire">
        <br>
        <br>
      </p>
    </article>
  </form>
</main>
<?php $content = ob_get_clean();

require 'views/template.php';
?>
