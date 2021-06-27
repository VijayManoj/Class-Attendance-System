<html>
    <head>
        <title>Welcome to the Page </title>
        <link rel="stylesheet" type="text/css" href="Style.css"> 
        <link rel="icon" href="cloud-storage.png">
        <style>
input {
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>


</head>
<body onload="fun1()">
   <?php
   $a1=" ";
   $a2=" ";
  $a3=" ";
   $b=3;
  $server="127.0.0.1";
  $user="VijayManoj";
  $password="K1931V15";
  $db="class_attendance_db";





 $connect=mysqli_connect($server,$user,$password,$db);

 if(!$connect)
 {
     die("Sorry unable to connect ".mysqli_connect_error());

 }
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
       if($_POST["n1"]=='')
       {
          $a1='Field Required';
          $b=$b-1;
       }
       if($_POST["n2"]=='')
       {
           $a2='Field Required';
           $b=$b-1;

       }
       if($_POST["n3"]=='')
       {
           $a3="Field Required";
           $b=$b-1;

       }
       else if($_POST["n3"]!=$_POST["hai"])
       {
             $b=$b-1;
             $a3="Invalid Captcha";


       }
       
       if($b==3)
       {
           $b1=$_POST["n1"];
           $b2=$_POST["n2"];
           $b2=sha1($b2);
           $sql1="SELECT * from `Create_db` where ID='$b1'";
           $res1=mysqli_query($connect,$sql1);
          $num=mysqli_num_rows($res1);
         // echo $num;

          if($num<=0)
          {

             $a1="ID Doesn't Exist";

          } else {
              $r=mysqli_fetch_assoc($res1);
             
              if($b2==$r['Password'])
              {

                $uni1=$r['ID'];
                $uni2=$r['Name'];

                  header("Location:LoggedIn.php?n=".$r['Name']);
              } else {
                  $a2="Incorrect Password ";
                //  echo "Hai".$b2;
                  //echo "\nHello".$r['Password'];


              }
          }

       }
   }
   ?>

   <header>
       <h2><img src="cloud-storage.png" width="40px" height="40px"> Class Attendance System </h2> <br>
       <a href="http://localhost/Project/CreateAccount.php">Create Account </a>
       <a href="http://localhost/Project/SignIn.php">SignIn </a>
</header>

 <div class="container" >
    

      <form method="POST" action="#">
     <label>Teacher ID </label> <input type="text" placeholder="Eg:1234" name="n1" style="margin-left:60px"> <span>* <?php echo $a1; ?></span> <br><br>
     <label>Password </label> <input type="Password" name="n2" style="margin-left:65px"> <span>* <?php echo $a2; ?> </span> <br> <br>
       <span id="captcha" style="margin-left:180px;"></span>
    
    <input type="hidden" name="hai" id="check"> <button  style="margin-right:280px; margin-top:8px" onClick="fun1()"><img src="refresh.png" width="15px" height="15px"> </button> <br> 
     
     <input type ="text" name="n3" onpaste="return false" style="margin-left:135px;"><span> *<?php echo $a3;?> </span><br> <br>

       <button type="Submit" >Submit</button>

    </form>

</div>


<footer>
 
<p> vijay.manoj.kota@gmail.com </p> <br>
<p>6304236807</p>

   
</footer>



</body>
<script>

let code;



function fun1()
{
     //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
    document.getElementById("check").value=code
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
 
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
 // console.log(code)
  document.getElementById("check").value=code
//  console.log(code)

}
</script>

</html>
