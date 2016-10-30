<?php
abstract class Connection {
  protected $host = "localhost";
  protected $dbname = "mydb_test";
  protected $user = "root";
  protected $pass = "root2535";
  protected $DBH  = null ;
  public function __construct(){
    $this->DBH = new PDO( 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->user , $this->pass );
    $this->DBH->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
    $this->DBH->setAttribute( PDO::ATTR_EMULATE_PREPARES , false );
    /*
    if( $this->DBH  ){
      echo "Connection Ok.";
    }else{
      echo "Connection fail.";
    }
    */
  }

  public function closeConnection(){
    $this->DBH = null ;
  }
  // insert table
  abstract protected function insert( Array $data ) ;

  //delete table
  abstract protected function delete( $id );

  //update table
  abstract protected function update( Array $data , $id );

}
