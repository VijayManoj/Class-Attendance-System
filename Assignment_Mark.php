<html>
<head>
<title>Welcome to the Page </title>
<link rel="stylesheet" type="text/css" href="Style.css">
<link rel="icon" href="cloud-storage.png">
<style>
.fin
{
    cursor: pointer;
    border:1px solid #888888;
    background:#888888;
    color:white;
    padding:8px;
    float:right;
}
</style>
</head>
<body>
<?php

if(array_key_exists('Signout',$_POST))
{
    Signout();
  
}




function Signout()
{
    
    session_start();
    session_destroy();
    header("Location:SignIn.php");
    exit();


}
$a1="";
$a2="";
$a3="";
$b=3;
$check=0;

?>

<header>
 <h2><img src="cloud-storage.png" width="40px" height="40px"> Class Attandance System </h2> <br>
    <h3> <?php //echo 'Welcome  '.$val;?> 
    </h3> <br><br>

       <a href="http://localhost/Project/CreateClass.php">Create Class</a>
       <a href="http://localhost/Project/MarkAttandance.php">Mark Attandance </a> 
       <a href="http://localhost/Project/Assignment_Mark.php">Assign Marks </a> <br><br><br><br>

 
    <form method="POST" action="#">
    <button type="SignOut" name="Signout" >SignOut</button>
  </form>
 
 </header>

<form method="POST" action="#">

<div class="conatiner">

<input type="text" name="c1" placeholder="Room.No" id="r1" value="<?php echo $a1;?>">  <span>*</span>
<input type="text" name="c2" placeholder="Subject" id="r2" value="<?php echo $a2;?>"><span>*</span>

<input type="text" name="c3" placeholder="Slot" id="r3" value="<?php echo $a3;?>"><span>*</span>

<button type="Submit" name="sum">Submit</button> <br> <br>






<?php
if(isset($_POST["sum"]))
{
  
    if($_POST["c1"]=="")
    {
             $b=$b-1;
    echo '<script>alert("Subject Field Required")</script>';
            }
    if($_POST["c2"]=="")
    {
        $b=$b-1;
        echo '<script>alert("Subject Field Required")</script>';
    }
    if($_POST["c3"]=="")
    {
        $b=$b-1;
        echo '<script>alert("Slot Field Required")</script>';
    }
    if($b==3)
    {
        $a1=$_POST["c1"];
        $a2=$_POST["c2"];
        $a3=$_POST["c3"];

        $host="127.0.0.1";
        $user="VijayManoj";
        $pass="K1931V15";
        $db1="Student_List";

        $tb1=$a1."_".$a2."_".$a3;
        $con1=mysqli_connect($host,$user,$pass,$db1);

      $sql1="SELECT * from `$tb1`";
      $res1=mysqli_query($con1,$sql1);
      if(!$res1)
      {
          echo"<script>alert('List Does not Exist')</script>";
      } ?>
      
      
      
      
      
      
     

<?php if($res1) {

while($row=$res1->fetch_assoc())
{
    $check=$check+1;
   
    $t1=$row["STUDENT_ID"];
    
    $t3=$row["STUDENT_ID"]."M";
    $t2="<input type=number style='margin-left:100px;' required='' id=".$t3.">"."<button type='button' id=".$t1." Onclick='fun1(this.id)' name='Mark1' class='prb1' style='align-items:left'>Lock </button>";

    $t1=$t1." ".$t2."<br><br>"; 
    
    
    echo $t1;
   
    

}
}





}

}



?>

<input type="hidden" id="hai1"  name="please1">
<input type="hidden" id="hai2"  name="please2">
<input type="hidden" id="check" name="check" value="<?echo $check?>">



<input type="Submit" value="Lock Marks" class="fin" name="Lock Marks"onclick="post1()">


</div>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $abc=$_POST["check"];
    echo $abc;
    $a=$_POST["please1"];
    $b=$_POST["please2"];
   // echo $a;
  //  echo $b;
    $id=explode(',',$a);
    $marks=explode(',',$b);
    if($a!="")
    {
        
      //  echo $check." ".sizeof($marks);

   // echo "okay";
   require_once __DIR__ . '/vendor/autoload.php';
 
   $con=new MongoDB\Client("mongodb+srv://Class_Attandance:K1931V15m@cloudproject.jqr2j.mongodb.net/test?authSource=admin&replicaSet=atlas-7403sm-shard-0&readPreference=primary&appname=MongoDB%20Compass&ssl=true");


   $db=$con->Class_Attendance;
 
   $db1=$_POST["c1"]."_".$_POST["c2"]."_".$_POST["c3"]."_Assignment Marks";
        
  $collection=$db->$db1;

  $collection->insertOne(["STUDENT_ID's"=>$id,"Marks"=>$marks]);

  echo"<p style='text-align:center;font-size:25px'>Marks Recorded Sucessfully</p>";


}
}
?>
</form>

<input type="hidden" name ="b1" id="b1" value="<?php echo $a1;?>">

<input type="hidden" name ="b2" id="b2" value="<?php echo $a2;?>">

<input type="hidden"  name="b3" id="b3" value="<?php echo $a3;?>">


<footer style="margin-top:10%;">
 
 <p> vijay.manoj.kota@gmail.com </p> <br>
 <p>6304236807</p>
 </footer>

</body>

<script>
let marks=[],id=[];
function post1()
{
    //console.log("hai");
  //  let a=document.querySelectorAll(".Marks");
   // for()
  //console.log(id);
 // console.log(marks);
 if(marks=='')
 {
     alert("Marks Should be Alloted");
 }else {

 document.getElementById('hai1').value=id;
 document.getElementById('hai2').value=marks;
 //console.log("hai");


 }
  

}

function fun1(c)
{
   b=c.concat("M");
    let a =document.getElementById(b).value;
    //console.log(a);
    if(a!='')
    {
    document.getElementById(b).setAttribute('readonly',true);
    document.getElementById(b).style.backgroundColor='#d6d6c2';
   id.push(c);
   marks.push(a);
    }else {
        alert("Marks Should be given");

    }
} 

document.getElementById('r1').value=document.getElementById('b1').value
 
document.getElementById('r2').value=document.getElementById('b2').value
document.getElementById('r3').value=document.getElementById('b3').value

</script>

</html>
