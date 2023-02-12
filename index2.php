<?php

ob_start();



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


h4{

font-family: 'Gochi Hand', cursive;
text-align: left;
color: red;
font-size:20px;
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
<h2> SIGN UP </h2>

    <form action="" method="get"  enctype="text/plain" >


    <input type="text" name="name" class="box2"  placeholder="First Name"  required>
    
<br>
<br>


    <input type="text" name="namel" class="box2" placeholder="Last Name"  required>
     

<br>
<br>


      <input type="text" name="username" class="box2"  placeholder="username"  required>

      <br>
      <br>



      <input type="password" name="password" class="box2"  placeholder="password " pattern=".{6,}" title="six or more characters" required>
      <br>
      <br>
      <br>
      <button type="submit" name="submitbutton" >Create account</button>
    </form>




<br>
<br>
<br>
<br>











</div >


</body>

</html>


<?php

 $link=mysqli_connect("finalprojectweb","root","");


if(!$link){
    
die("connection error".mysqli_connect_errno(). " :" .mysqli_connect_error());

} 
















 $founduser=false;



if(isset($_GET['submitbutton'])){


mysqli_select_db($link,"finaldata");


$n1=$_GET['name'];
$n2=$_GET['namel'];
$n3=$_GET['username'];
$n4=$_GET['password'];



$check=mysqli_query($link,"SELECT username , pass FROM Players");

while($record=mysqli_fetch_array($check)){
  
    if( $record['username'] == $n3 ){

      echo "<script type='text/javascript'>alert(' This username already exits !'  );</script>";

$founduser=true;
    break;

    }




}



if($founduser==false){

$c="INSERT INTO Players VALUES ('$n1' , '$n2' , '$n3' ,'$n4' , 0)";

mysqli_query($link,$c);
 //echo "<script type='text/javascript'>alert(' your account is created !'  );</script>";
 header("Location: index.php");
 ob_end_flush();
 







}







}





 





 mysqli_close($link);


?>









