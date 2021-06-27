<html>
<head>
<title>Welcome to the Page</title>
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
<body>
   <header>
     
   <h2>  <img src="cloud-storage.png" width="40px" height="40px">Class Attendance System </h2> <br> 
     <a href="http://localhost/Project/CreateAccount.php">Create Account</a>
     <a href="http://localhost/Project/SignIn.php">Sign In </a>
      </header>
   <?php
   $a1='';
   $a2='';
   $a3='';
   $a4='';
   $a5='';
   $a6='';
   $b=6;
   $fin='';








   $server="127.0.0.1";
   $user="VijayManoj";
   $password="K1931V15";
  $db="class_attendance_db";

  $connect=mysqli_connect($server,$user,$password,$db);

  if(!$connect)
  {
      die("Sorry unable to connect ".mysqli_connect_error());

  }
  //Creation of Table 

/*
  $sql1="CREATE table Create_db (
      `Name` varchar(30),
      `ID`   varchar(10) Primary Key,
      `Password` varchar(90),
      `Email`  varchar(40),
      `Department` varchar(20)
  )";

  $res1=mysqli_query($connect,$sql1);

  if($res1)
  {
      echo "Okay";
  }else {
      echo "Not Okay";

  } */




   if($_SERVER['REQUEST_METHOD']=="POST")
   {
          if($_POST["n1"]=='')
          {
                  $a1="Field Required";
                  $b=$b-1;
          }
          if($_POST['n2']=='')
          {
              $a2='Field Required';
              $b=$b-1;
          }
          if($_POST["n3"]=='')
        {
                  $a3="Field Required";
                  $b=$b-1;
        }
        if($_POST["n4"]=='')
        {
            $a4='Field Required';
            $b=$b-1;
        }
        if($_POST['n3']!='' and $_POST['n4']!='')
        {
            if($_POST['n3']!=$_POST['n4'])
            {
                $a3='Password Should Match';
                $a4="Password Should Match";
                $b=$b-1;
            }
        }
        if($_POST['n5']=='')
        {
            $a5='Field Required';
            $b=$b-1;
        }
        if($_POST['n6']=='')
        {
            $a6='Field Required';
            $b=$b-1;
        }
        if($b==6)
        {

             $d1=$_POST["n1"];
             $d2=$_POST["n2"];
             $d3=$_POST["n3"];
             $d4=$_POST["n5"];
             $d5=$_POST["n6"];
             $d3=hash('sha1',$d3);

             
             
             //Inserting Values 

             $sql2="INSERT into `Create_db` values('$d1','$d2','$d3','$d4','$d5')";
             $res2=mysqli_query($connect,$sql2);


            if($res2){

                $db1=$_POST["n2"]."_".$_POST["n1"];
                $conn1=mysqli_connect($server,$user,$password);
                if(!$conn1)
                {
                    die("Sorry unable to connect ".mysqli_connect_error());
              
                }
               


             $fin='Account Created Sucessfully';
            }
            else {
                $fin="Account Not Created ";
                $a2="Teacher ID Exists ";

            }
        }

   }

   ?>

    <div class="container">
    
     <form method="POST" action="#">
       <label>Name </label><input type="text" placeholder="Eg:John" name="n1" style="margin-left:150px"> <span>*</span> <span id="s1"> <?php echo $a1;?> </span> <br><br>
       <label>Teacher ID </label><input type="text" placeholder="Eg:12345" name="n2" style="margin-left:110px"> <span>*</span> <span id="s2">  <?php echo $a2;?> </span><br> <br>
       <label> Password </label> <input type="Password" name="n3" style="margin-left:120px"> <span>*</span> <span id="s3" >  <?php echo $a3;?> </span> <br> <br>
       <label> Confirm Password </label> <input type="Password" name="n4" style="margin-left:58px"> <span>*</span> <span id="s4">  <?php echo $a4;?> </span> <br> <br>
       <label>Email </label> <input type="Email" placeholder="Eg:john@gmail.com" name="n5" style="margin-left:150px"> <span>*</span> <span id="s5">  <?php echo $a5;?> </span> <br><br>
      <label>Department</label> <input type="text" placeholder="Eg :CSE" name="n6" style="margin-left:105px"> <span>*</span> <span id="s6" > <?php echo $a6;?> </span> <br><br>
       <p style="text-align:center"><?php echo $fin; ?> </p>

      <button type="Submit">Submit</button>
  </form>
 </div>
  <footer>
     <p>vijay.manoj.kota@gmail.com</p>
     <p>6304236807</p>
     </footer>


    </div>
    </body>
    </html>
