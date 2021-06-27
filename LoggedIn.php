<html>
<head>
<title>Welcome to the Page </title>
<link rel="stylesheet" type="text/css" href="Style.css">
<link rel="icon" href="cloud-storage.png">

</head>
<body>
<?php 

$val=htmlentities($_GET['n']);

$_SESSION['user']=$val;
session_start();
$a1=" ";
$a2=" ";
$a3=" ";

  //session_start();

    if(array_key_exists('Signout',$_POST))
    {
        Signout();
    }
    function Signout()
    {
        
        session_unset();
        session_destroy();
        header("Location:SignIn.php");

    }
    $b=3;
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
      if($_POST["o1"]=='')
      {
        $a1='Field Required';          
        $b=$b-1;

      }
      if($_POST["p1"]=='')
      {
        $a2='Field Required';
        $b=$b-1;
      }
      if($_POST["p2"]=='')
      {
        $a3="Field Required";
        $b=$b-1;
      }
      if($b==3)
      {
        $host="127.0.0.1";
        $user="VijayManoj";
        $pass="K1931V15";
        $db="class_attendance_db";
        $connect=mysqli_connect($host,$user,$pass,$db);

        $sql1="SELECT * from `create_db` where `Name`='$val'";
         $res1=mysqli_query($connect,$sql1);
         $r=mysqli_fetch_assoc($res1);

        $pre=$_POST["o1"];
        $pre=hash('sha1',$pre);
        if($pre==$r['Password'])
        {
           $p1=$_POST["p1"];
           $p2=$_POST["p2"];
           if($p1==$p2)
           {
             $a=$r['ID'];
             $p1=hash('sha1',$p1);
             $sql2="UPDATE `create_db` SET `Password`='$p1' where `ID`='$a'";
             $res2=mysqli_query($connect,$sql2);
             echo'<script>alert("Password Changed Sucessfully")</script>';

           }else {
             echo'<script>alert("Both should have same password")</script>';
           }

        }else {
         echo'<script>alert("Old Password was incorrect")</script>';

        }

      }
    }
?>

<header>

<h2><img src="cloud-storage.png" width="40px" height="40px"> Class Attendance System </h2> <br>
    <h3> <?php echo 'Welcome  '.$val;?> 
    </h3> <br><br>

       <a href="http://localhost/Project/CreateClass.php">Create Class</a>
       <a href="http://localhost/Project/MarkAttandance.php">Mark Attendance </a> 
       <a href="http://localhost/Project/Assignment_Mark.php">Assign Marks </a> <br><br>
  <form method="POST" action="#">
    
  <button type="SignOut" name="Signout">SignOut</button>

</form>

</header>
 <div class="container">
  
  
  <form method="POST" action="#">
    <h3>Update Password </h3>
    <label> Old Password </label> <input type="Password" name="o1" style="margin-left:80px;"><span>* <?php echo $a1;?></span> <br>
    <label> New Password </label> <input type="Password" name="p1" style="margin-left:70px;"><span>* <?php echo $a2;?></span> <br>
    <label> Confirm Password <label> <input type="Password" name="p2" style="margin-left:45px;"><span>* <?php echo $a3;?> </span><br>
    <button type="Submit">Submit</button>
  
  </form>

 

 </div>

<footer style="margin-top:10%;">
 
<p> vijay.manoj.kota@gmail.com </p> <br>
<p>6304236807</p>
</footer>

</body>
</html>
