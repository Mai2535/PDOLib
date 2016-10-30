<?php
//require_once( 'connection.php' );
require_once('Core2DB.php');

class User extends Core2DB {
  public function __construct(){

    parent::__construct() ;
    $this->_tableName = "user";
  }
  public function fetchUserAll(){
    $stmt = $this->DBH->query( 'select * from '.$this->_tableName.'' );
    return $stmt->fetchAll( PDO::FETCH_ASSOC );
  }
  public function countUser(){
    $stmt = $this->DBH->query( 'select * from  '.$this->_tableName.'' );
    return $stmt->rowCount();
  }

}
