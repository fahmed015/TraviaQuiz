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
  max-width: 980px;
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


.box2 {


    margin-left: 50px;
    margin-top: 50px;
    border-radius: 10px 10px 10px 10px;
  padding: 30px;

  width: 300px;
  height:300px;

  border: 2px solid;
  
  

  
  box-shadow: 0 4px 5px 0 rgba(0,0,0,0.3);
  box-shadow: 0 4px 5px 0 rgba(0,0,0,0.3);
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
 
 
  overflow: hidden;

 
   
   position: fixed;
   height:90px;
   display:inline-block;
 
   text-align: right;
   float:right;
   
   top: 0;
 
 }
 
 .navbar button {
    display: inline-block;
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
    display: inline-block;
  background-color: black;
font-size: 30px;
font-family: 'Bree Serif', serif;
  color: white;

  text-decoration: none;
  padding: 14px 20px;
  float:right;
}
.box2 a {

    text-decoration: none;


}

.box2:hover{
    opacity: 0.8;
    border: 3px solid;
}

a, a:visited, a:hover, a:active {
  color: inherit;
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

<div class="box2">


<a href="game.php">

<h2>Football Quiz</h2>
<img src="https://cdn0.iconfinder.com/data/icons/sports-and-fitness-flat-colorful-icons-svg/137/Sports_flat_round_colorful_simple_activities_athletic_colored-03-512.png"  height="270" >
</a>


</div>

<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>

<br>
<br>
</div>

</body>

</html>

























