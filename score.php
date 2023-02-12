<!DOCTYPE html>
<html>
<head>




<!-- <meta http-equiv="refresh"
   content="0; url=index.php"> -->




 <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

 <script type="text/javascript">
     history.pushState(null, null, location.href);
      history.back(); 
      history.forward(); 
      window.onpopstate = function () { history.go(1); };
    </script> 

 



<style>

.box {
  border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 100%;
  max-width: 550px;
  position: absolute;
  top: 140px;
  right: 500px;
  
  height: auto;
  font-size: 15px;


  padding: 0px;
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align:center;


  

}

.box button {
  
  position: absolute;
  text-align:center;
 left:60px; 
 
  background-color: #56baed;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
  position: absolute;

}

.box button:hover {
  opacity: 0.8;
}

.navbar {
  
  width:100%;
 
  display: inline-block;
  overflow: hidden;

   position: fixed;
   
   height:90px;
  
 
   text-align: right;
  
   
   top: 0;
 
 }
 
 .navbar button {
    cursor: pointer;
    background-color: #f44336;
  font-size: 30px;
  font-family: 'Bree Serif', serif;
    color: white;
    border: none;
    padding: 14px 20px;
    float:right;

}
.navbar a2 {
  
  background-color: black;
font-size: 30px;
font-family: 'Bree Serif', serif;
  color: white;

  text-decoration: none;
  padding: 14px 20px;
  float:right;

}






    </style>





</head>



<body style="background-color:#56baed ;">

<?php
ob_start();
session_start();

?>

<div class="navbar">

<form action="index.php" method="get"  enctype="text/plain" >
    <a2>  <?php echo  $_SESSION["firstname"] . " " .$_SESSION["lastname"] ?> </a2>
      
     <button type="submit" name="logoff" >SignOut</button>    
        </form>
        <button onclick="window.location.href='home.php';" type="submit" name="home" >Home</button>   
</div>



<div class="box">


<?php

//if(isset($_GET['submitt'])){

//echo $_GET["q1"];
//echo $_GET["answer1"];

$score=0;

$a=$_GET["q1"];
$b= $_GET["answer1"];



$a2=$_GET["q2"];
$b2= $_GET["answer2"];



$a3=$_GET["q3"];
$b3= $_GET["answer3"];


$a4=$_GET["q4"];
$b4= $_GET["answer4"];




$a5=$_GET["q5"];
$b5= $_GET["answer5"];




if($a==$b){

    $score++;
   // echo "right1" ;
}


if($a2==$b2){

    $score++;
   // echo "right2" ;
    
}
if($a3==$b3){

    $score++;
   // echo "right3" ;
   
}
if($a4==$b4){

    $score++;
   // echo "right4" ;
   
}


if($a5==$b5){

    $score++;
    //echo "right5" ;
   
}

echo  "<h1>";
echo "Score";
 echo "</h1> ";






echo  "<h1>";
echo $score . "/5";
 echo "</h1> ";


 $a=$_SESSION["user"];
 $b=$_SESSION["pass"];




 $link=mysqli_connect("finalprojectweb","root","");


 if(!$link){
     
 die("connection error".mysqli_connect_errno(). " :" .mysqli_connect_error());
 
 } 

 mysqli_select_db($link,"finaldata");

 $check=mysqli_query($link,"SELECT * FROM Players");

 while($record=mysqli_fetch_array($check)){
   
     if( $record['username'] == $a && $record['pass'] == $b){
 
      $d=$record['username'];
      $f=$record['pass'];
     
      $e=$record['score'];

 
     }
 
}


$c="UPDATE Players SET score = $score WHERE username ='$d' AND pass = '$f' " ;



mysqli_query($link,$c);
 




?>

<form action="game.php"  method="GET" enctype="multipart/form-data">

<button type="submit" name="submit" >Restart The Quiz</button> 


</form>




<br>
<br>
<br>
<br>
<br>
<br>



</div>

</body>

</html>

























