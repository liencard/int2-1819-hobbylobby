<?php
/*
 *
*/
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

setlocale(LC_ALL,'nl_BE');
date_default_timezone_set("Europe/Brussels");

// eventueel nog met een session werken

// set routes
$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'activiteiten' => array(
    'controller' => 'Pages',
    'action' => 'activiteiten'
  ),
  'detail' => array(
    'controller' => 'Pages',
    'action' => 'detail'
  ),
  'jaarlijks' => array(
    'controller' => 'Pages',
    'action' => 'jaarlijks'
  ),
  'overons' => array(
    'controller' => 'Pages',
    'action' => 'overons'
  ),
  'lidworden' => array(
    'controller' => 'Pages',
    'action' => 'lidworden'
  ),
  'contact' => array(
    'controller' => 'Pages',
    'action' => 'contact'
  ),
  'cart' => array(
    'controller' => 'Orders',
    'action' => 'cart'
  ),
  'checkout' => array(
    'controller' => 'Orders',
    'action' => 'checkout'
  ),
  'confirmation' => array(
    'controller' => 'Orders',
    'action' => 'confirmation'
  ),
  'confirmationcontact' => array(
    'controller' => 'Pages',
    'action' => 'confirmationcontact'
  ),
  'confirmationlid' => array(
    'controller' => 'Pages',
    'action' => 'confirmationlid'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
