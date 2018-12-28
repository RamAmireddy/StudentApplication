<?php
include 'db.php';
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>


<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  
</div>

<div style="padding-left:16px">
  <h2>Student Data</h2>
 
</div>
<div>
<?php
if(isset($_GET['edit'])){
    $editid=$_GET['edit'];
    $editq="select * from students where id=$editid";
    $edi_res=mysqli_query($con,$editq);
    $edit_row=mysqli_fetch_array($edi_res);?>
    <div>
<form action="update.php" method='post'>
  <div class="container">
    <h1>Editing data of <?php echo $edit_row['name']?></h1>
    <hr>
    <label for="studenID"><b>Student ID</b></label>
    <input type="text" id="sId" name="uid" value=<?php echo $edit_row['id']?> readonly >
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="uname" Value= <?php echo $edit_row['name']?> required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="uemail" Value= <?php echo $edit_row['email']?> required>

    <label for="branch"><b>Branch</b></label>
    <input type="text"  name="ubranch" Value= <?php echo $edit_row['branch']?> required>
    
    <button type="submit" class="button" name='update' value='submit'>update</button>
  </div>
<?php

}

if(isset($_POST['update'])){
    $con = mysqli_connect("localhost","root","123","student");
    $uname=$_POST['uname'];
    $uemail=$_POST['uemail'];
    $ubranch=$_POST['ubranch'];
    $uid=$_POST['uid'];
    $updateq="UPDATE  `student`.`students` SET  `name` =  '$uname',
    `email` =  '$uemail',
    `branch` =  '$ubranch' WHERE  `students`.`id` =$uid";
    $updatq=mysqli_query($con,$updateq);
    if($updatq){
        echo "<script>alert('student data is updated')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else
    echo "<script>alert('student data is not updated')</script>";
}


  ?>



</body>