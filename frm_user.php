<html>
<head><title>Inser User</title></head>
<body>
Firstname : <input type="text" id="firstname" /> <br/>
Lastname : <input type="text" id="lastname" /> <br/>
Age : <input type="age" id="age" /> <br/>
<button onclick="doAddUser();" >Add user</button> <br/>
<span id="message" > </span >

<script>
function doAddUser(){
  var xmlHttp = callAjaxHttp() ;

  if( xmlHttp ){
    var url = 'user.php';
    var firstName = document.getElementById( 'firstname' ).value ;
    var lastName = document.getElementById( 'lastname' ).value ;
    var age = document.getElementById('age').value ;
    var params = "fir="+firstName+"&last="+lastName+"&age=" + Number(age) ;

    xmlHttp.open( "POST" ,url ,true );
    xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    //xmlHttp.setRequestHeader('Content-Length', params.length );
    //xmlHttp.setRequestHeader('Connection','close');
    xmlHttp.send( params );

    xmlHttp.onreadystatechange = function(){
      if( this.readyState == 4 && this.status == 200 ){
          clearTagValue("input") ;
          document.getElementById( 'message' ).innerHTML = this.responseText ;
          document.getElementById( 'message' ).style.color = 'green';
      }
    }
  }else{
    alert( "XMLHttpRequest can not vail" ) ;
  }
}
function callAjaxHttp(){
  var xmlHttp = false ;
  if( window.XMLHttpRequest ){
    xmlHttp = new XMLHttpRequest();
  }else{
    xmlHttp = new ActiveXObject( 'Microsoft.XMLHTTP' );
  }
  return xmlHttp ;
}
function clearTagValue( tag ){
  var inp = document.getElementsByTagName( tag );
  for( var i = 0 ; i < inp.length ; i++ ) {
    inp[i].value = "" ;
  }
}
</script>
</body>
</html>
