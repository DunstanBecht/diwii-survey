<?php namespace models;

abstract class Record {

  // attributes
  private $data = array();

  // attributes handling
  public function __set($name, $value) {
    if (array_key_exists($name, static::$primary_key)) {
      if (isset($this->$name)) {
        throw new \Exception("Attribute '" . $name . "' is a primary key and is already defined.");
      }
      $type = static::$primary_key[$name][0];
    } elseif (array_key_exists($name, static::$foreign_key)) {
      $type = static::$foreign_key[$name][0];
    } elseif (array_key_exists($name, static::$attributes)) {
      $type = static::$attributes[$name][0];
    } else {
      #throw new \Exception("Records of type " . get_class($this) . " have no attribute '" . $name . "'.");
      $ignoredAttribute = true;
    }
    if (!isset($ignoredAttribute)) {
      if (is_null($value) or gettype($value)==$type) {
        $this->data[$name] = $value;
      } else {
        if ($type=='integer') {
          $this->data[$name] = (int) $value;
        } else {
          throw new \Exception("Attribute '" . $name . "' must be of type " . $type . ". Type '" . gettype($value) . '" was given."');
        }
      }
    }
  }
  public function __get($name) {
    if (array_key_exists($name, $this->data)) {
      return $this->data[$name];
    } else {
      return NULL;
    }
  }
  public function __isset($name) {
    return isset($this->data[$name]);
  }
  public function __unset($name) {
    unset($this->data[$name]);
  }

  // hydrate
  public function hydrate(array $data) {
    foreach ($data as $key => $value) {
      $this->$key = $value;
    }
  }

  // construct
  public function __construct(array $data) {
    $this->hydrate($data);
  }

}
