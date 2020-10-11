<?php

require_once( __DIR__ . '/DAO.php');

class ActivityDAO extends DAO {

public function selectAll($date = false, $type = false) {
    $sql = "SELECT * FROM `int2_activities` WHERE 1";
    
    $bindValues = array();
    if (!empty($date) &&  $_GET['date'] != 'all' ) {
      $sql .= " AND MONTH(`int2_activities`.`start`) = :start";
      $bindValues[':start'] = $date;
    }

    if (!empty($type) &&  $_GET['type'] != 'all' ) {
      $sql .= " AND `int2_activities`.`type` = :type";
      $bindValues[':type'] = $type;
    }
    
    $sql .= " ORDER BY `start` ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

public function selectById($id){
    $sql = "SELECT * FROM `int2_activities` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

public function selectByTime($limit){
    $sql = "SELECT * FROM `int2_activities` ORDER BY `start` ASC LIMIT :limit";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':limit',$limit);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

public function selectMarkt(){
    $sql = "SELECT * FROM `int2_activities` WHERE `type` = 'jaarlijks'";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

public function selectTypes(){
    $sql = "SELECT DISTINCT `type` FROM `int2_activities` ORDER BY `type`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

public function selectMonths(){
    $sql = "SELECT DISTINCT MONTH(`start`) AS `month` FROM `int2_activities`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

public function insertMessage($data){
    $errors = $this->validateContact( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `int2_contact` (`firstname`, `lastname`, `email`, `message`) VALUES (:firstname, :lastname, :email, :message)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname', $data['firstname']);
      $stmt->bindValue(':lastname', $data['lastname']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':message', $data['message']);
      $stmt->execute();
    }
   return false;
  } 

public function validateContact($data){
    $errors = [];
    if (empty($data['firstname'])) {
      $errors['firstname'] = 'Gelieve je voornaam in te vullen';
    }
    if (empty($data['lastname'])) {
      $errors['lastname'] = 'Gelieve je familienaam in te vullen';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'E-mail is verplicht';
    }
    if (empty($data['message'])) {
      $errors['message'] = 'Gelieve een bericht achter te laten';
    }
    
    return $errors;
  }

public function insertUser($data){
    $errors = $this->validateUser( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `int2_members` (`firstname`, `lastname`, `email`, `adres`, `housenumber`, `postcode`, `city`, `gender`, `birthdate`) VALUES (:firstname, :lastname, :email, :adres, :housenumber, :postcode, :city, :gender, :birthdate)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname', $data['firstname']);
      $stmt->bindValue(':lastname', $data['lastname']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':adres', $data['adres']);
      $stmt->bindValue(':housenumber', $data['housenumber']);
      $stmt->bindValue(':postcode', $data['postcode']);
      $stmt->bindValue(':city', $data['city']);
      $stmt->bindValue(':gender', $data['gender']);
      $stmt->bindValue(':birthdate', $data['birthdate']);
      $stmt->execute();
    }
   return false;
  }

public function validateUser($data){
    $errors = [];
    if (empty($data['firstname'])) {
      $errors['firstname'] = 'Gelieve je voornaam in te vullen';
    }
    if (empty($data['lastname'])) {
      $errors['lastname'] = 'Gelieve je familienaam in te vullen';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'E-mail is verplicht';
    }
    if (empty($data['adres'])) {
      $errors['adres'] = 'Gelieve je straatnaam op te geven';
    }
    if (empty($data['housenumber'])) {
      $errors['housenumber'] = 'Gelieve je huisnummer op te geven';
    }
    if (empty($data['postcode'])) {
      $errors['postcode'] = 'Gelieve een postcode op te geven';
    }
    if (empty($data['city'])) {
      $errors['city'] = 'Gelieve een gemeente op te geven';
    }
    if (empty($data['gender'])) {
      $errors['gender'] = 'Gelieve een geslacht te selecteren';
    }
    if (empty($data['birthdate'])) {
      $errors['birthdate'] = 'Gelieve een geboortedatum op te geven';
    }
    
    return $errors;
  }


}
