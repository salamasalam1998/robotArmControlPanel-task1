<?php
include('index.php');


$link = mysqli_connect ('localhost' , 'root','','controlpanel') ;

if(isset($_POST['save'])){
    $engine1=$_POST['engine1'];
    $engine2=$_POST['engine2'];
    $engine3=$_POST['engine3'];
    $engine4=$_POST['engine4'];
    $engine5=$_POST['engine5'];
    $engine6=$_POST['engine6'];
    $flipswtch=$_POST['statuss'];
    
    $query ="INSERT INTO engines (engine1,engine2, engine3,engine4,engine5,engine6,The_Status) 
    VALUES('$engine1','$engine2','$engine3','$engine4','$engine5','$engine6','$flipswtch')";
    
    $run =mysqli_query($link , $query) or die (mysqli_error($link));

    if($run){
        echo "Form Submitted";

        $table ='engines';
        $last_row = mysqli_query($link ,"SELECT * FROM $table ORDER BY ID DESC "); 
$get_last_row=mysqli_fetch_array($last_row); 
echo "<center> DataBase Values" ;
echo "<br>";
for ($i=1; $i<=6 ; $i++){
    
  echo "Engine$i: $get_last_row[$i] "; echo "<br>";
}
echo "<center> STATUS: $get_last_row[7] " ; echo"<br>"; 

        
       }

        else {
        echo " Failed to submit";
        }
       


    } 
    ?>