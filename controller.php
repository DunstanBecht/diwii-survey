<?php

if (count($path)==2) {
  // Enterprise verification:
  $dbh = new PDO(DB_DSN, DB_USR, DB_PWD);
  $manager = new models\EnterpriseManager($dbh, 'TableC');
  $enterprise = $manager->get(array('siren'=>$path[0]));
  if ($enterprise->token!=$path[1]) {
    http_response_code(403);
    throw new Exception('(403) Accès refusé.');
  }
  // First opening:
  if (!isset($enterprise->opened)) {
    $enterprise->opened=date("Y-m-d H:i:s");
    $manager->update($enterprise);
  }
  // Answer processing:
  if (isset($_SESSION['is_answered'])) {
    unset($_SESSION['is_answered']);
    foreach ($_SESSION as $key => $value) {
      if (substr($key, 0, 6)=='answer' or $key=='mail'or $key=='need') {
        $enterprise->$key= $value;
        unset($_SESSION[$key]);
      }
    }
    $enterprise->answerDate=date("Y-m-d H:i:s");
    $manager->update($enterprise);
  }
  // Display:
  if (isset($enterprise->answerDate)) {
    require 'views/pages/thanks.php';
  } else {
    require 'views/pages/survey.php';
  }
} elseif (count($path)==1 and $path[0]=='send') {
  if (isset($_SESSION['password']) and $_SESSION['password']=='161803') {
    $dbh = new PDO(DB_DSN, DB_USR, DB_PWD);
    if (isset($_SESSION['send']) and $_SESSION['send']=='send') {
      unset($_SESSION['send']);
      //$sql = "SELECT siren FROM TableC WHERE lastSend IS NULL LIMIT 100";
      $sql = "SELECT siren FROM TableC WHERE answerDate IS NULL AND DATEDIFF(NOW(), lastSend) > 5 AND unsubscribed IS NULL LIMIT 100";
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $sirenList = $sth->fetchall(PDO::FETCH_COLUMN, 0);
      $dbh = new PDO(DB_DSN, DB_USR, DB_PWD);
      $manager = new models\EnterpriseManager($dbh, 'TableC');
      $data = array();
      foreach ($sirenList as $siren) {
        $enterprise = $manager->get(array('siren'=>$siren));
        $link = "https://" . $_SERVER['HTTP_HOST'] . '/' . $enterprise->siren . '/' . $enterprise->token;

        ob_start(); ?>
<html>
  Bonjour,<br>
  <br>
  Nous vous contactons en tant que représentant de l'entreprise <b><?= $enterprise->name ?></b>.<br>
  <br>
  Nous sommes étudiants et travaillons sur un projet inter-écoles (AURASMUS) avec l'<b>Ecole des Mines Saint-Etienne</b>, l’<b>EN3S</b> et l'<b>EM Lyon</b>, pour étudier la maturité du déploiement de la transformation vers l'industrie du futur dans le tissu industriel d'Auvergne-Rhône-Alpes<br>
  Pour ce faire, nous menons une enquête, sous forme d’un questionnaire d'environ 3 minutes (7 questions simples), auprès des entreprises de la région pour définir les enjeux et les problématiques rencontrés à ce propos.<br>
  <br>
  <a href="<?= $link ?>" ><?= $link ?></a><br>
  <br>
  Les réponses seront consolidées par secteur d’activité, taille d’entreprise et département AURA, dont les résultats pourront vous être communiqués si vous le souhaitez.<br>
  Nous vous remercions pour votre coopération et nous tenons à votre disposition pour toute information complémentaire. Pout entrer en contact avec nous vous pouvez répondre à ce mail.<br>
  <br>
  Cordialement, <br>
  <br>
  L'équipe Aurasmus:<br>
  - Delphine LEBREUILLY / EN3S<br>
  - Anais LACROIX BERNELIN / EN3S<br>
  - Dunstan BECHT / Ecole des Mines<br>
  - Matthieu BERTRAND / Ecole des Mines<br>
  - Eléonore COLLET / EM Lyon<br>
  - Louison BONADEI / EM Lyon<br>
  - Guy FERNANDEZ / EM Lyon<br>
</html>
        <?php $message_html = ob_get_clean();
        $message_text = preg_replace("/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags($message_html))));

        $to = $enterprise->name . '<' . $enterprise->mail . '>';
        $subject = "Projet Etudiant Inter-Ecoles / Industrie du Futur";

        $boundary = md5(uniqid(rand()));
        $message = "This is multipart message using MIME\n";
        $message.= "------=_NextPart_" . $boundary . "\n";
        $message.= "Content-Type: text/plain; charset=utf-8\n";
        $message.= "Content-Transfer-Encoding: 7bit". "\n\n";
        $message.= $message_text . "\n\n";
        $message.= "------=_NextPart_" . $boundary . "\n";
        $message.= "Content-Type: text/html; charset=utf-8\n";
        $message.= "Content-Transfer-Encoding: 7bit". "\n\n";
        $message.= $message_html . "\n";
        $message .= "------=_NextPart_" . $boundary . "--";

        $headers = 'MIME-Version: 1.0' .  "\r\n" .
                   "Content-Type: multipart/alternative; boundary=\"----=_NextPart_" . $boundary . "\"" .  "\r\n" .
                   "List-Unsubscribe: <mailto: dunstan@becht.network?subject=unsubscribe>" . "\r\n" .
                   'From: Dunstan BECHT <dunstan@' . 'becht.network' . '>' . "\r\n" .
                   'Return-Path: dunstan@' . 'becht.network' . "\r\n" .
                   'Reply-To: Dunstan BECHT <dunstan.becht@etu.emse.fr>, Matthieu BERTRAND <matthieu.bertrand@etu.emse.fr>, Delphine LEBREUILLY <dlebreuilly@en3s.net>, Anais LACROIX BERNELIN <alacroixbernelin@en3s.net>, Eléonore COLLET <eleonore.collet@edu.em-lyon.com>, Louison BONADEI <louison.bonadei@edu.em-lyon.com>, Guy FERNANDEZ <guy.fernandez@edu.em-lyon.com>' . "\r\n" ;

        try {
          if (filter_var($enterprise->mail, FILTER_VALIDATE_EMAIL) == FALSE) {
              throw new \Exception("Wrong format", 1);
          }
          $domain = substr($enterprise->mail, strpos($enterprise->mail, '@') + 1);
          if  (checkdnsrr($domain) == FALSE) {
              throw new \Exception("Wrong DNS", 1);
          }
          mail($to, $subject, $message, $headers);
          $data[] = $enterprise->mail;
          $enterprise->lastSend=date("Y-m-d H:i:s");
          $manager->update($enterprise);
        } catch (Exception $e) {
          $data[] =$e->getMessage() . $enterprise->mail;
        }
      }
    } else {
      $sql = "SELECT sendDate FROM TableC ORDER BY sendDate DESC LIMIT 1";
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $data = "Dernier envoie: " . print_r($sth->fetchall(\PDO::FETCH_ASSOC), true);
    }
    require 'views/pages/send.php';
  } else {
    require 'views/pages/login.php';
  }
} else {
  http_response_code(403);
  throw new Exception('(403) Accès refusé.');
}
