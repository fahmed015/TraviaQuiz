<?php

ob_start();
session_start();

if(isset($_GET['logoff']))
{
  session_unset(); 
  
  session_destroy();
  



}



?>



<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Gochi+Hand&display=swap" rel="stylesheet">
<style>

.box {
  border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: absolute;
  top: 140px;
  right: 550px;
  
  height: 500px;


  padding: 0px;
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}



h1{
font-size:16px;
font-family: 'Courgette', cursive;
text-align: center;
}

h2 {
    font-family: 'Oswald', sans-serif;
}

h3{

    font-family: 'Gochi Hand', cursive;
    text-align: center;
    color: #56baed;
    font-size:15px;
}


.box2 {
   
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
    padding: 10px;
     
 width:75%;
  
}




button {
  background-color: #56baed;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
}

button:hover {
  opacity: 0.8;
}

input[type="text"]{  
                text-align: center; 
            } 



            input[type=text]:focus {
  background-color: #fff;
 
}
input[type="password"]{  
                text-align: center; 
            } 



            input[type=text]:focus {
  background-color: #fff;
 
}



.sin{
text-decoration: none;
}


</style>
</head>



<body style="background-color:#56baed ;">



<div class="box">



 
<br>
<br>
<h2> SIGN IN </h2>

    <form action="" method="get"  enctype="text/plain" >
      <input type="text"  class="box2" name="username" placeholder="username" required>

      <br>
      <br>

      <input type="password" class="box2" name="password" placeholder="password" required>
      <br>
      <br>
      <br>
      <button type="submit" name="loginbutton">Login</button>
    </form>

<br>
<br>
<br>
<br>

<h1> Don't have an account ? </h1>  
<a class="sin" href="index2.php">
        <h3> sign up </h3>
      </a>










</div>

</body>

</html>

<?php



 
$link=mysqli_connect("finalprojectweb","root","");


if(!$link){
    
die("connection error".mysqli_connect_errno(). " :" .mysqli_connect_error());

} 




if(mysqli_query($link,"CREATE DATABASE finaldata ")){
   echo("database created");
}
else{
  echo("database failed to create" ."<br>");
}



mysqli_select_db($link,"finaldata");









$sql = "CREATE TABLE Players (
  
  firstname VARCHAR(30) ,
  lastname VARCHAR(30) ,
  username VARCHAR(30),
  pass VARCHAR(30),
  score int DEFAULT 0
  )";
  
  if (mysqli_query($link, $sql)) {
    echo "Table players created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($link);
  }

















 if(isset($_GET['loginbutton'])){




  $a=$_GET['username'];
  $b=$_GET['password'];
  
  
$founduser=false;
$foundadmin=false;



$check=mysqli_query($link,"SELECT * FROM Players");

while($record=mysqli_fetch_array($check)){
  
    if( $record['username'] == $a && $record['pass'] == $b){

$_SESSION["user"] = $record['username'];
$_SESSION["firstname"] = $record['firstname'];
$_SESSION["lastname"] = $record['lastname'];
$_SESSION["pass"] = $record['pass'];
$_SESSION["score"] = $record['score'];

//print_r($_SESSION);

$founduser=true;
header("Location:home.php");
ob_end_flush();


    

    }




}





if($founduser==false ){
  echo "<script type='text/javascript'>alert('wrong username or password !'  );</script>";

}









} 




mysqli_close($link);
 


?>