<?php
require_once 'user_model.php';

$user_obj = new User();
/*
$sql = 'insert into user ( chvFirName , chvSurName , intAge ) values ( "'.$_POST['fir'].'" ,"'.$_POST['last'].'",'.$_POST['age'].' )';
$lastId = $user->insert( $sql );
echo $lastId ;
*/
/*
$user = (isset( $_POST['fir'] )) ? $_POST['fir']:"" ;
$pass = (isset( $_POST['last'] )) ? $_POST['last']:"" ;
$age  = (isset( $_POST['age'] )) ? $_POST['age']:"" ;

$data = array(
  "chvFirName" => $user,
  "chvSurName" => $pass,
  "intAge" => $age
);

$user_obj -> insert( $data );
$msg = "";
$msg .= "insert success. <br/>";
$msg .= "Users Row = <b>".$user_obj -> countUser()."</b>" ;

echo $msg ;
*/
$data = array(
  "chvFirName" => "หนุ่ม" ,
  "chvSurName" => "มีซอ",
  "intAge" => 32
);

$affectRow = $user_obj -> update( $data , 23 );
if( $affectRow >= 1 ){
  echo "Updata success.";
}
