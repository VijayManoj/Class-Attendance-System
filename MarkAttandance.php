<html>
<head>
<title>Welcome to the Page </title>
<link rel="stylesheet" type="text/css" href="Style.css">
<link rel="icon" href="cloud-storage.png">

<style>
.prb1{

  background-Color:gray;
 
  margin-right:400px;


}
.prb2{

background-Color:gray;

margin-right:270px;
margin-top:-32px;

}
.fin{
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
<header>
 <h2><img src="cloud-storage.png" width="40px" height="40px"> Class Attendance System </h2> <br>
    <h3> <?php //echo 'Welcome  '.$val;?> 
    </h3> <br><br>

    <a href="http://localhost/Project/CreateClass.php">Create Class</a>
       <a href="http://localhost/Project/MarkAttandance.php">Mark Attendance </a> 
       <a href="http://localhost/Project/Assignment_Mark.php">Assign Marks </a> <br><br>


 
    <form method="POST" action="#">
    <button type="SignOut" name="Signout" >SignOut</button>
  </form>
 
 </header>
 <form method="POST" action="#" id="form1">
 <?php



$e='';

$a2="";
$a3="";
$a4="";
$a5="";


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
$a1='';
$a='';
$b='';
$d='';
$c=4;
?>

<div class="container">



<input type="text" name="c4" placeholder="Room.No" id="r1" value="<?php echo $a2;?>"> <span>*</span>
<input type="text" name="c1" placeholder="Subject" id="r2"style="margin-left :2%" value="<?php echo $a3;?>"> <span>*</span>
<input type="text" name="c2" placeholder="Slot" id="r3"style="margin-left:2%;" value="<?php echo $a4;?>"> <span>*</span>  <br><br>
<label>Date </label> <input type="Date" name="c3" id="r4"style="margin-left:20%" value="<?php echo $a5;?>"><span>*</span> 
<button type="Submit" name="sum">Submit</button> <br><br>
All Present <input type="radio" value="Mark1" name="all"> All Absent <input type="radio" value="Mark2" name="all">   <input type="button" style="cursor: pointer;
    border:1px solid #888888;
    background:#888888;
    color:white;
    padding:8px; "onclick="fun4()" value="Submit">  <br> <br>
  

<?php


  if($_SERVER['REQUEST_METHOD']=="POST")
{
 
   $db1=$_POST["c4"]."_".$_POST["c1"]."_".$_POST["c2"];
   //echo $db1;
  $date=$_POST["c3"];
  //echo $date;

  $att=$_POST['please'];
  //echo $att;
  $att1=explode(",",$att);
  
   
  /*
  foreach($att1 as $a)
   {
     echo $a;
     
   }*/

   if($att1[0]!=" ")
   {
  require_once __DIR__ . '/vendor/autoload.php';
 
  $con=new MongoDB\Client("mongodb+srv://Class_Attandance:K1931V15m@cloudproject.jqr2j.mongodb.net/test?authSource=admin&replicaSet=atlas-7403sm-shard-0&readPreference=primary&appname=MongoDB%20Compass&ssl=true");


    $db=$con->Class_Attendance;
    //Selecting the Database
    $collection=$db->$db1;
    //Selection Collection 

    
    
    
  // $document=array(["Date"=>$date,"list"=>$att1]);
   
   $collection->insertOne(["Date"=>$date,"Present list"=>$att1]);
  // Inserting Row 
  // $abr="Attadance Recorded Sucessfully";
   echo"<p style='text-align:center;font-size:25px'>Attadance Recorded Sucessfully</p>";

    
   }




  


   

}


if(isset($_POST["sum"]))
{
    if($_POST['c4']=='')
     {
         $c=$c-1;
         echo '<script>alert("Room No Field Required ")</script>';
     }
    if($_POST['c1']=='')
    {
        $c=$c-1;
        echo'<script>alert("Subject Field Required")</script>';
    }
    if($_POST['c2']=='')
    {
        $c=$c-1;
        echo'<script>alert("Slot Field Required")</script>';

    }
    if($_POST['c3']=='')
    {
        $c=$c-1;
        echo '<script>alert("Date Field Required")</script>';
    }

    if($c==4)
{
  
    $a2=$_POST['c4'];
    
    $a3=$_POST['c1'];
    $a4=$_POST['c2'];
    $a5=$_POST['c3'];        
 
 
    $tb_1=$a2.'_'.$a3.'_'.$a4;
    $host="127.0.0.1";
    $user="VijayManoj";
    $pass="K1931V15";
    
    $db_1="Student_List";
    
    $connect=mysqli_connect($host,$user,$pass,$db_1);
    
    
    $sql1="SELECT * from `$tb_1`";
    $res1=mysqli_query($connect,$sql1);
   if(!$res1)
   {
     echo "<script>alert('List Does not Exist')</script>";
   }
  
    
 ?>

 










<?php


 if($res1)
 {

while($row=$res1->fetch_assoc())
{
$s=$row['STUDENT_ID'];
$a=$row['STUDENT_ID'].'P';

$s=$s."<button type='button' id=".$a." Onclick='fun1(this.id)' name='Mark1' class='prb1'>Present</button> ";

$b=$row['STUDENT_ID'].'A';
$s=$s."<button type='button' id=".$b." Onclick='fun2(this.id)' name='Mark2' class='prb2'>Absent</button> <br>";

echo $s.'<br><br>';

} 
}


}
}



?>

<input type="submit" name="Post Attendance"
                class="fin" onclick="post1()" value="Post Attendance" /> 


<input type="hidden" id="hai" value=" " name="please">


<input type="hidden" name ="b1" id="b1" value="<?php echo $a2;?>">

<input type="hidden" name ="b2" id="b2" value="<?php echo $a3;?>">

<input type="hidden"  name="b3" id="b3" value="<?php echo $a4;?>">

<input type="hidden" name="b4" id="b4" value="<?php echo $a5;?>">

 




</form>
<br> <br>
<p style="text-align:center;"><?php echo $e;?></p>
</form>
</div>

 <footer style="margin-top:10%;">
 
 <p> vijay.manoj.kota@gmail.com </p> <br>
 <p>6304236807</p>
 </footer>


</body>

<script>


var p1=[],a1=[];
let k1=0;


function fun1(c)
{
  let a=String(c);
    a=a.replace('P',' ');
   var sam=a1.indexOf(a);
   if(sam==-1)
   {
    document.getElementById(c).style.backgroundColor = "green";
     //  console.log("Present",a)
  p1.push(a)
//console.log(p1);
   } else {
     a1.splice(sam,1);
     a=a.replace(' ','A');
     document.getElementById(a).style.backgroundColor="gray";
     document.getElementById(c).style.backgroundColor="green";

   }
   

}
function fun2(d)
{
    
   
   
    let a=String(d);
    a=a.replace('A',' ');
    var sam=p1.indexOf(a);
    
 if(sam==-1)
 {
   // console.log("Absent",a)
 a1.push(a)
 document.getElementById(d).style.backgroundColor="red";
 //console.log(a1)
 }
  else {
  p1.splice(sam,1);
    a=a.replace(' ','P')
    console.log(a);
   
    document.getElementById(d).style.backgroundColor="red";
    document.getElementById(a).style.backgroundColor="gray";
    
  
   // console.log(p1);

  }
   
}


function fun4()
{
 
 var l=document.getElementsByName('all');
 k1=k1+1;

 if(l[0].checked)
 {
   p1.push("All Present")
  // console.log(l[0].value)

  if(k1==1)
  {
   let pre1=document.getElementsByName('Mark1');
   p1=[];
   p1.push("All Present");

   

   for(let i=0;i<pre1.length;i++)
   {
     pre1[i].style.backgroundColor="green";
     
   }
  }

  else {


    let pre1=document.getElementsByName('Mark1');
    let pre2=document.getElementsByName('Mark2');
    p1=[];
    p1.push("All Present");
    for(let i=0;i<pre2.length;i++)
   {
     pre2[i].style.backgroundColor="gray";
     pre1[i].style.backgroundColor="green";
   

   }

  }


 } 
 if(l[1].checked)
 {
  let pre2=document.getElementsByName('Mark2');
  p1.push("All Absent");
 
   k1=k1+1;
   if(k1==1)
   {
    p1=[];
    p1.push("All Absent");
   for(let i=0;i<pre2.length;i++)
   {
     pre2[i].style.backgroundColor="red";
    

   }
   }else 
   {
    let pre1=document.getElementsByName('Mark1');
    p1=[];
    p1.push("All Absent");
    for(let i=0;i<pre2.length;i++)
   {
     pre2[i].style.backgroundColor="red";
     pre1[i].style.backgroundColor="gray";
    

   }
     
   }
   //console.log(l[1].value)
 }

 
}


var fin=0;
function post1()
{
    
  if(p1=='')
  {
      
      alert("Attendace Must be Taken ");

  } else {
  
 
  

    fin=1;
   
   console.log(fin);

   //console.log("hai");
   
   document.getElementById('hai').value=p1;
   var pri=document.getElementById('hai').value;
   
  console.log(pri);


 
 /* 
 var request = new XMLHttpRequest();
 $(document).ready(function() {
    createCookie("gfg",p1,"400");

  });
  request.onreadystatechange = function() 
  {
  
    if (this.readyState == 4 && this.status == 200) 
    {
      alert(this.responseText);
    
    }
   
  };


  request.open("POST", "Variable.php", true);
  request.send();

*/

  }
  
}

document.getElementById('r1').value=document.getElementById('b1').value
 
document.getElementById('r2').value=document.getElementById('b2').value
document.getElementById('r3').value=document.getElementById('b3').value
document.getElementById('r4').value=document.getElementById('b4').value


</script>



</html>
