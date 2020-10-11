<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ActivityDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';


class PagesController extends Controller {

  function __construct() {
    $this->activityDAO = new ActivityDAO();
    $this->orderDAO = new OrderDAO();
  }

  public function index() {
    $activities = $this->activityDAO->selectByTime(3);
    $this->set('activities', $activities);
    $this->set('title', 'Home');
  }

  public function activiteiten() {

    $date = false;
    if (!empty($_GET['date'])) {
      $date = $_GET['date'];
    }
    $type = false;
    if (!empty($_GET['type'])) {
      $type = $_GET['type'];
    }
    $activities = $this->activityDAO->selectAll($date, $type);

    if(empty($activities)){
       $_SESSION['info'] = 'Geen activiteiten gevonden';
    }

    $this->set('activities', $activities);
    $this->set('types',$this->activityDAO->selectTypes()); // types in dropdown krijgen
    $this->set('months',$this->activityDAO->selectMonths()); // maanden in dropdown krijgen
    $this->set('title', 'Activiteiten');


    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($activities);
      exit();
    }
  }

  public function detail() {

    if(!empty($_GET['id'])){
      $activity = $this->activityDAO->selectById($_GET['id']);
    }

    if(empty($activity)){
      header('Location: index.php?page=activiteiten');
      exit();
    }

    $this->set('activity',$activity);
    $this->set('title', 'Activiteiten');
  }

  public function jaarlijks() {

    $activity = $this->activityDAO->selectMarkt();

   $this->set('activity',$activity);
   $this->set('title', 'Kruidenmarkt');
  }

  public function overons() {
   $this->set('title', 'Over ons');
  }

  public function lidworden() {
    if(!empty($_POST['action'])){
        if($_POST['action'] == 'insertUser'){
            $insertedUser = $this->activityDAO->insertUser($_POST);
            if(!$insertedUser){
              $errors = $this->activityDAO->validateUser($_POST);
              $this->set('errors',$errors);
            }else{
              header('Location:index.php?page=lidworden');
              exit();
            }
          header('Location:index.php?page=confirmationlid');
        }
      }
   $this->set('title', 'Lid worden');
  }

  public function contact() {

    if(!empty($_POST['action'])){
        if($_POST['action'] == 'insertMessage'){
            $insertedMessage = $this->activityDAO->insertMessage($_POST);
            if(!$insertedMessage){
              $errors = $this->activityDAO->validateContact($_POST);
              $this->set('errors',$errors);
            }else{
              header('Location:index.php?page=contact');
              exit();
            }
          header('Location:index.php?page=confirmationcontact');
        }
      }
   $this->set('title', 'Contact');
  }

  public function confirmationcontact() {

   $this->set('title', 'Contact');
  }

   public function confirmationlid() {

   $this->set('title', 'Lidworden');
  }

}
