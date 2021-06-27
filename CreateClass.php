<html>
<head>
 <title>Welcome to the Page </title>
 <link rel="stylesheet" type="text/css" href="Style.css">
 <link rel="icon" href="cloud-storage.png">
<style>
footer {
    margin-top:28%;
}
</style>

 </title>
 </head>
 <body>

 <?php
#include 'Variable.php';
 #echo $uni1;

$c='';

if(array_key_exists('Signout',$_POST))
{
    Signout();
  
}
function Signout()
{
    
    header('location:SignIn.php');
    session_destroy();
    


}

$a1='';

$a='';
$b='';
$d=4;
$e='';

if($_SERVER['REQUEST_METHOD']=="POST")
{

     if($_POST['c3']=='')
     {
         $d=$d-1;
         echo '<script>alert("Room No Field Required ")</script>';
     }
     if($_POST['c1']=='')
     {
         $d=$d-1;
         echo'<script>alert("Subject Field Required")</script>';
        }
     if($_POST['c2']=='')
     {
         $d=$d-1;
         echo'<script>alert("Slot Field Required")</script>';
     }
     if($_POST['ID1']=='')
     {
        echo'<script>alert("Student ID Field Required")</script>';
         $d=$d-1;

     }
     if($d==4)
     {
         $a1=$_POST['c3'];
    $a=$_POST['c1'];
  $b=$_POST['c2'];

  $c=$_POST['ID1'];
  $host="127.0.0.1";
  $user="VijayManoj";
  $pass="K1931V15";

$db_1="Student_List";
$num=0;

$tb_1=$a1.'_'.$a.'_'.$b;
$conn1=mysqli_connect($host,$user,$pass,$db_1);


$sql4="SELECT `Student_ID` from `$tb_1` where `Student_ID`='$c'";
$res5=mysqli_query($conn1,$sql4);
$num=mysqli_num_rows($res5);


if($num<=0)
{


$sql1="INSERT into `$tb_1` values('$c')";
$res1=mysqli_query($conn1,$sql1);
if(!$res1)
{
    $sql2="CREATE table `$tb_1`(
        STUDENT_ID varchar(30) Primary Key 
    )";
    $res2=mysqli_query($conn1,$sql2);
    
    $res3=mysqli_query($conn1,$sql1);

    $e='Student '.$c.' added sucessfully';

}else 
{
    $e='Student '.$c.' added sucessfully';
}
  


}


else {
   echo'<script>alert("Student ID Exists")</script>';
}
     }
}




?>
 <header>
 <h2><img src="cloud-storage.png" width="40px" height="40px"> Class Attendance System </h2> <br>
    <h3> <?php //echo 'Welcome  '.$val;?> 
    </h3> <br><br>

       <a href="http://localhost/Project/CreateClass.php">Create Class</a>
       <a href="http://localhost/Project/MarkAttandance.php">Mark Attendance </a>
       <a href="http://localhost/Project/Assignment_Mark.php">Assign Marks </a> <br><br> <br><br>

       <form method="POST" action="#">
    
    <button type="SignOut" name="Signout">SignOut</button>
  
  </form>
 </header>

 <div class="container">

   <form method="POST" action="#">
   <input type="text" name="c3" placeholder="Room.No" value="<?php echo htmlentities($a1);?>"> <span>*</span>
   <input type="text" name="c1"  style="margin-left :2%" placeholder='Subject' value="<?php echo htmlentities($a);?>"> <span>*</span>

   <input type="text" name="c2" style="margin-left:2%;" placeholder='Slot' value="<?php echo htmlentities($b);?>"> <span>*</span> <br> <br> <br><br>


 <label>Student ID </label> <input type="text" name="ID1" placeholder='Student ID'style="margin-left:20%">  <span>*</span> 
  
  <button type="Submit" style='margin-left:-100px'>Submit</button>


   </form>
   <br> <br>
<p style="text-align:center;"><?php echo $e;?></p>

 </div>



 <footer style="margin-top:10%;">
 
 <p> vijay.manoj.kota@gmail.com </p> <br>
 <p>6304236807</p>
 </footer>

 </body>



 </html>
