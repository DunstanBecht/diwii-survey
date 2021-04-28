<?php
session_start();
// Post-Redirect-Get:
if (count($_POST)>0) {
  foreach ($_POST as $key => $value){
      $_SESSION[$key] = htmlspecialchars($value);
  }
  header('HTTP/1.1 303 See Other');
  header('Location: ' . $_SERVER['REQUEST_URI']);
  die();
}
// Settings:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("models/admin.php")) {
    include "models/admin.php";
} else {
    include "models/reader.php";
}
// Autoload:
spl_autoload_register(function ($class_name) {
  include str_replace('\\', '/classes/', $class_name) . '.php';
});
// Path:
$path = explode('/', substr($_SERVER['REQUEST_URI'], 1));
// Routing:
try {
  require 'controller.php';
} catch (Exception $e) {
  $error_message = $e->getMessage();
  require 'views/pages/error.php';
}
