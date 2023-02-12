

    
<!DOCTYPE html>
<html>
<head>







<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

  <script type="text/javascript">
     history.pushState(null, null, location.href);
      history.back(); 
      history.forward(); 
      window.onpopstate = function () { history.go(1); };
    </script>  





<style>

.box {
  overflow:hidden;
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
  text-align:left;


  

}

.box button {
  
  position: absolute;
  text-align:center;
 left:40px; 
 
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
    display: inline-block;
    float:right;

}
.navbar a2 {
  
  background-color: black;
font-size: 30px;
font-family: 'Bree Serif', serif;
  color: white;

  text-decoration: none;
  padding: 14px 20px;
  display: inline-block;
    float:right;

}


.side{


  position: fixed;
   
   height:90px;
  
 width:400px;
   text-align: center;

 top:100px;
 left:1100px;

 border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;




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

    


$client= new SoapClient("https://footballpool.dataaccess.eu/info.wso?wsdl");
$result=$client->AllTeamCoachNames(array());
//print_r($result);
$array=$result->AllTeamCoachNamesResult->tTeamCoachName;
//print_r($array);




$link=mysqli_connect("finalprojectweb","root","");


if(!$link){
    
die("connection error".mysqli_connect_errno(). " :" .mysqli_connect_error());

} 




mysqli_select_db($link,"finaldata");













$randIndex = array_rand($array);
$r=(($array[$randIndex])->sTeamName);

//echo $r;
echo "<br>";

?>
<h1> Who is the coach of <?php echo $r ?> ? </h1>
<?php

foreach($array as $k=>$v){

   
    if(($v->sTeamName)==$r){
        $ans1=($v->sCoachName);
        unset($array[$k]);
    
    }
}






$q1=array();

 for($i=0;$i<3;$i++){
$randIndex = array_rand($array);
$r=(($array[$randIndex])->sCoachName);
unset($array[$randIndex]);
array_push($q1,$r);

 }

 array_push($q1,$ans1);


 shuffle($q1);


 foreach($q1 as $k=>$v){

 


?>


<form action="score.php"  method="GET" enctype="multipart/form-data">

<input  type="radio"   id="ff" name="q1" value= "<?php echo $v ?>" required >
<input type='hidden' name="answer1"   value="<?php echo $ans1 ?>">

<label for="ff"> <?php echo $v ?> </label> <br>

<br>


   
<?php




 }
 $result=$client->AllStadiumInfo(array());
//print_r($result);
$array=$result->AllStadiumInfoResult->tStadiumInfo;
//print_r($array);

$result2=$client->CityNames(array());
//print_r($result2);
$array2=$result2->CityNamesResult->string;
//print_r($array2);
$randIndex = array_rand($array);
$r=(($array[$randIndex])->sName);
echo "<br>";
echo "<br>";

?>

<h1> Which city is <?php echo $r ?> located? </h1>




 <?php

foreach($array as $k=>$v){

   
  if(($v->sName)==$r){
      $ans1=($v->sCityName);
     // unset($array[$k]);
  
  }
}

foreach($array2 as $k=>$v){

   
  if($v==$ans1){
     
     unset($array2[$k]);
  
  }
}




$q1=array();

for($i=0;$i<3;$i++){
$randIndex = array_rand($array2);
$r=(($array2[$randIndex]));
unset($array2[$randIndex]);

array_push($q1,$r);

}

array_push($q1,$ans1);


shuffle($q1);


foreach($q1 as $k=>$v){




 ?> 




 <input  type="radio"   id="ff" name="q2" value= "<?php echo $v ?>" required >
 <input type='hidden' name="answer2"   value="<?php echo $ans1 ?>">
<label for="ff"> <?php echo $v ?> </label> <br>

 <br>
 

 
<?php
}
echo "<br>";
echo "<br>";

?>
<h1> Which of these Players is not in the Egyptian National Team ? </h1>

<?php
$result=$client->TeamPlayers(array('sTeamName'=>'Egypt' , 'bSelected'=>false));
//print_r($result);

$array=$result->TeamPlayersResult->tPlayer;
//print_r($array);

$result2=$client->TeamPlayers(array('sTeamName'=>'Egypt' , 'bSelected'=>true));
//print_r($result);

$array2=$result2->TeamPlayersResult->tPlayer;
//print_r($array);


$randIndex = array_rand($array);
$ans=(($array[$randIndex])->sName);



$q1=array();

for($i=0;$i<3;$i++){
  $randIndex = array_rand($array2);
  $r=(($array2[$randIndex])->sName);
  unset($array[$randIndex]);
  array_push($q1,$r);
  
  }




array_push($q1,$ans);
shuffle($q1);

foreach($q1 as $k=>$v){


 ?>

<input  type="radio"   id="ff" name="q3" value= "<?php echo $v ?>" required>
<input type='hidden' name="answer3"   value="<?php echo $ans ?>">

<label for="ff"> <?php echo $v ?> </label> <br>

<br>



<?php

}


$result=$client->AllPlayerNames(array('bSelected'=>true));
//print_r($result);

$array=$result->AllPlayerNamesResult->tPlayerName;

//print_r($array);
$randIndex = array_rand($array);
$r=(($array[$randIndex])->sName);





echo "<br>";
echo "<br>";
?>

<h1> What is the player <?php echo $r ?> country? </h1>


<?php


foreach($array as $k=>$v){

   
  if(($v->sName)==$r){
      $ans1=($v->sCountryName);
     unset($array[$k]);
     
  }
}



$q1=array();



for($i=0;$i<3;$i++){
$randIndex = array_rand($array);
$r=(($array[$randIndex])->sCountryName);

foreach($array as $k=>$v){
  if(($v->sCountryName)==$r){
unset($array[$k]);
  }

}



array_push($q1,$r);

}

array_push($q1,$ans1);


shuffle($q1);


foreach($q1 as $k=>$v){




?> 




<input  type="radio"   id="ff" name="q4" value= "<?php echo $v ?>" required >
<input type='hidden' name="answer4"   value="<?php echo $ans1 ?>">

<label for="ff"> <?php echo $v ?> </label> <br>

<br>
 

 
<?php
}






$result=$client->AllPlayersWithCards(array());
//print_r($result);
$array=$result->AllPlayersWithCardsResult->tTeamPlayerCardInfo;


$randIndex = array_rand($array);
$r=(($array[$randIndex])->sName);





echo "<br>";

?>

<h1> How many yellow card <?php echo $r ?> has? </h1>


<?php



foreach($array as $k=>$v){

   
  if(($v->sName)==$r){
      $ans1=($v->iYellowCards);
      unset($array[$k]);
  
  }
}



$q1=array();
$c=0;
$rn=array(1,2,3,4,5,6,0,7);
foreach($rn as $k){
if($k==$ans1){
  unset($rn[$c]);
}




$c++;
}



for($i=0;$i<3;$i++){
$randIndex = array_rand($rn);

$r=$rn[$randIndex];

foreach($rn as $k=>$v){
  if(($v)==$r){
unset($rn[$k]);
  }
}


array_push($q1,$r);

}

array_push($q1,$ans1);


shuffle($q1);


foreach($q1 as $k=>$v){




?> 




<input  type="radio"   id="ff" name="q5" value= "<?php echo $v ?>" required >
<input type='hidden' name="answer5"   value="<?php echo $ans1 ?>">

<label for="ff"> <?php echo $v ?> </label> <br>

<br>





<?php

}

if(isset($_GET['submit'])){



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
 
 $final=$record['score'];
 


     }
 
}





}
else{

  
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
 
 $final=$record['score'];
 


     }
 
}

}



?>


<div class=side>
<h1>
your last score  was <?php echo $final ?>/5 
</h1>
</div>


 
 <button type="submit" name="submitt" >submit</button> 

 
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 





</form>

</div>

</body>

</html>

