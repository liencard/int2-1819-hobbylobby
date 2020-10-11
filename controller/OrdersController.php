<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';


class OrdersController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivityDAO();
    $this->orderDAO = new OrderDAO();
  }

  public function cart() {
    
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $_SESSION['info'] = 'Je activiteit werd toegevoegd!';
        header('Location: index.php?page=activiteiten');
        exit();
      }
      if ($_POST['action'] == 'empty') {
        $_SESSION['cart'] = array();
      }
      if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
      if ($_POST['action'] == 'checkout') {
        header('Location: index.php?page=checkout');
        exit();
      }
      header('Location: index.php?page=cart');
      exit();
    }
    
    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }

    $this->set('title', 'Uitchecken');
  }
  // stap 1
  public function checkout() {
    if(!empty($_POST['action'])){
      if (!empty($_POST['action'])){
        if ($_POST['action'] == 'insertCheckout'){
          $insertedCheckout = $this->_handleCheckoutOrder();
           if(!$insertedCheckout){
              $errors = $this->orderDAO->validateCheckout($_POST);
              $this->set('errors',$errors);
        } else { 
        $_SESSION['info'] = 'Bedankt voor je bestelling!';
        header('location: index.php?page=checkout');
        exit();
        }
      }
    }

    }
    $this->set('title', 'Checkout');
  }

  // stap 2 
  private function _handleCheckoutOrder(){
    $data = $_POST;
    if($gegevensId = $this->orderDAO->insertGegevens($data)){
      $this->_handleCheckout($gegevensId);
    }
    exit();
  }

  // stap 3
  private function _handleCheckout($gegevensId) {
    $data = array();
    if(!empty($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $activityId => $quantity) {
        array_push($data, array(
          'order_id' => $gegevensId['id'],
          'activity_id' => $activityId,
          'quantity' => $quantity['quantity']
        ));
      }
      foreach($data as $order){
        $this->orderDAO->insertOrder($order);
      }
        header('Location: index.php?page=confirmation');
        exit();
        }
  }
  

  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['activity_id']])) {
      $activity= $this->activityDAO->selectById($_POST['activity_id']);
      if (empty($activity)) {
        return;
      }
      $_SESSION['cart'][$_POST['activity_id']] = array(
        'activity' => $activity,
        'quantity' => $_POST['quantity']
      );
    }
    $_SESSION['cart'][$_POST['activity_id']]['quantity'];
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }
  

  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $activityId => $quantity) {
      if (!empty($_SESSION['cart'][$activityId])) {
        $_SESSION['cart'][$activityId]['quantity'] = $quantity;
      }
    }
    $this->_removeWhereQuantityIsZero();
  }

  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $activityId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$activityId]);
      }
    }
  }

  public function confirmation() {
    $this->set('title', 'Confirmation');
  }
 
}
