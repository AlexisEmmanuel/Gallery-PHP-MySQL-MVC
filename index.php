<?php
require_once './app/core/db.php';
require_once './app/core/routes.php';


if (isset($_GET['c'])) {
  $controller = ucwords($_GET['c']); // Get the controller
  $action = isset($_GET['a']) ? $_GET['a'] : 'getImages'; // Get the action
  require_once "./app/controller/".$controller."Controller.php"; // Bring the controller file
  $controller = $controller . 'Controller'; // Makes the class name
  $controller = new $controller; // Load the class
  $controller -> $action(); // Execute the action
} else { // if ared empty the variable $_get:
  $controller = DEFAULTCONTROLLER; // Load the default controller
  $controller = ucwords($controller); // Set the new format  for controller
  require_once "./app/controller/".$controller."Controller.php"; // Name format for controllers
  $controller = $controller . 'Controller';
  $controller = new $controller; // Create new object with the name of controller
  $controller->getImages(); // Cal the default controller
}