<?php
require_once( 'Connection.php' );
class Core2DB extends Connection {

  protected $_tableName ;
  public function __construct() {
    parent::__construct();
  }

  public function insert( Array $data ){
    $column = '';
    $value = '' ;
    foreach( $data as $key => $val ){
      if( $column == '' ){
        $column .= ' '.$key.' ';
      }else{
        $column .= ' , '.$key.' ';
      }
      if( $value == '' ){
        $value .= ' "'.$val.'" ';
      }else{
        $value .= ', "'.$val.'" ';
      }
    }
    $sql  = 'insert into '.$this->_tableName.'  ( '.$column.') values ('.$value.') ' ;
    $result = $this->DBH->exec( $sql );
    return $this->DBH->lastInsertId();

  }

  public function update( Array $data , $id ){
      $params = '';
      foreach( $data as $key => $value ){
        if( $params == '' ){
            $params .= ' '.$key.' = "'.$value.'" ' ;
        }else{
            $params .= ', '.$key.' =  "'.$value.'" ' ;
        }
      }
      $sql = 'update '.$this->_tableName.' set '.$params.'  where id = ? ' ;
      $stmt = $this->DBH->prepare( $sql ) ;
      $stmt->execute( array( $id ) );
      return $stmt->rowCount() ;
  }

  public function delete( $id ){
    if( is_int( $id ) ){
      $stmt = $this->DBH->prepare( 'delete from '.$this->_tableName.' where id = ? ' );
      $stmt->execute( array($id) );
      return $stmt ->rowCount();
    }
  }

}
