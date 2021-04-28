<?php namespace models;

class Enterprise extends Record {

  static $manager = EnterpriseManager::class;

  static $primary_key = array(
    'siren'=>array('integer'),
  );

  static $foreign_key = array(
  );

  static $attributes = array(
    'activitePrincipaleEtablissement'=>array('string'),
    'mail'=>array('string'),
    'name'=>array('string'),
    'phone'=>array('string'),
    'token'=>array('string'),
    'lastSend'=>array('string'),
    'answerDate'=>array('string'),
    'opened'=>array('string'),
    'need'=>array('string'),
    'unsubscribed'=>array('string'),

    'answer1a'=>array('string'),
    'answer1b'=>array('string'),
    'answer1c'=>array('string'),
    'answer1d'=>array('string'),

    'answer2a'=>array('string'),
    'answer2b'=>array('string'),
    'answer2c'=>array('string'),
    'answer2d'=>array('string'),
    'answer2e'=>array('string'),
    'answer2f'=>array('string'),
    'answer2g'=>array('string'),
    'answer2h'=>array('string'),
    'answer2i'=>array('string'),

    'answer3a'=>array('string'),
    'answer3b'=>array('string'),
    'answer3c'=>array('string'),
    'answer3d'=>array('string'),
    'answer3e'=>array('string'),
    'answer3f'=>array('string'),

    'answer4a'=>array('string'),
    'answer4b'=>array('string'),
    'answer4c'=>array('string'),
    'answer4d'=>array('string'),
    'answer4e'=>array('string'),
    'answer4f'=>array('string'),

    'answer5'=>array('string'),
    'answer6a'=>array('string'),
    'answer6b'=>array('string'),

    'answer7'=>array('string'),
  );
}
