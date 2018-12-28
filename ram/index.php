<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
<script type="text/javascript" language="javascript">

window.onload = function() {
    document.getElementById("Button6").onmouseover = function()
    {
        this.style.backgroundColor = "#9933ff";
    }

    document.getElementById("Button6").onmouseout = function()
    {
        this.style.backgroundColor = "#9999ff";
    }
}


</script>
table{
    table-layout: fixed;
    width: 200px;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    background-color: #f44336;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
 
  cursor: pointer;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
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
  font-size: 14px;
 
  cursor: pointer;
}
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.containe {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 85%;
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
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  
</div>

<div style="padding-left:16px">
  <h2>Student Data</h2>
  <p>Some content..</p>
</div>
<div>
<table class="table">
  <tr>
    <th width= "50px" style="text-align:center">ID</th>
    <th width= "100px" style="text-align:center">Name</th>
    <th width= "100px" style="text-align:center">RollNo</th>
    <th width= "100px" style="text-align:center">Branch</th>
    <th width= "100px" style="text-align:center">Edit</th>
    <th width= "100px" style="text-align:center">delete</th>
  </tr>
  <?php
  if(!isset($_GET['page']))
  $page="1";
  else
  $page=$_GET['page'];
  if($page==''||$page=="1"){
  $page1=1;
  }
  else{

      $page1=($page*4)-4;
  }
    $sql = "SELECT * FROM students limit $page1,4";
    $res=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td width= '50px' style='text-align:center'><br>" . $row['id'] . "</td>";
echo "<td width= '100px' style='text-align:center'><br>" . $row['name'] . "</td>";
echo "<td width= '100px' style='text-align:center'><br>". $row['email'] . "</td>";
echo "<td width= '100px' style='text-align:center'><br>" . $row['branch'] . "</td>";
$rowid=$row['id'];
?>
<td width= '100px'>
    <p style='text-align:center'>
  <input    type="submit" onclick="document.getElementById('<?php echo  $rowid ?>').style.display='block'; margin-left: 50px;" style="width:auto;border-radius: 12px;white-space:pre;" class="button" value="Edit">
  </p>
 <div id="<?php echo  $rowid ?>" class="modal">
  
  <form class="modal-content animate" action="update.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('<?php echo  $rowid ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="container">
    <label for="studenID"><b>Student ID</b></label><br>
    <input type="text" id="sId" name="uid" value=<?php echo  $rowid ?> readonly ><br>
      <label for="uname"><b>Name</b></label><br>
      <input type="text" placeholder="Enter name" name="uname" value=<?php echo $row['name']; ?> required><br>

      <label for="email"><b>Email</b></label><br>
      <input type="text" placeholder="Enter email" name="uemail" value=<?php echo $row['email']; ?> required><br>
      <label for="branch"><b>Branch</b></label><br>
      <input type="text" placeholder="Enter branch" name="ubranch" value=<?php echo $row['branch']; ?> required><br>
        
      <input type="submit" class="button" name="update" value="submit" >
      <input type="button" onclick="document.getElementById('<?php echo  $rowid ?>').style.display='none'" class="cancelbtn" value="Cancel">
    </div>

  </form>
</div></td>









<?php
echo "<td width= '100px' style='text-align:center' ><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='index.php?delete=$rowid' class= 'cancelbtn' style='border-radius: 50%;text-decoration: none;'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";
if(isset($_GET['delete'])){
    $delid=$_GET['delete'];
    $delq="DELETE FROM students WHERE id = $delid";
    $del_res=mysqli_query($con,$delq);
    if($del_res>0){
        echo "<script>alert('A student data is removed')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        }
}



  ?>
  <div class="container">
<ul  align="center"style="position: relative;z-index:0">
<?php  
$sqli = "SELECT * FROM students";  
$rs_result = mysqli_query($con, $sqli);  
$rw = mysqli_num_rows($rs_result);    
$total_pages = ceil($rw / 4);  
$pagLink = "<div class='pagination pagination-lg'>";  
if($page > 1){
    $prev          = $page - 1;
    $pagLink .= "<li><a href='?page=".$prev."'>Prev</a></li>"; // Goto previous page
}

for ($i=1; $i<=$total_pages; $i++) {  
            $activeClass    =   ($page == $i) ? 'active' : '';
             $pagLink .= "<li  class=".$activeClass." ><a href='index.php?page=".$i."'>".$i."</a></li>";  
};  
if($page < $total_pages){
    $next          = $page + 1;
    $pagLink .= "<li><a href='?page=".$next."'>Next</a></li>"; // Goto Next page
}
if($page != $total_pages){
    $pagLink.= "<li><a href='?page=".$total_pages."'>".'|>'."</a></li>"; // Goto last page
}
echo $pagLink . "</ul></div>";  
?>

  <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="button">New Student</button>

 <div id="id02" class="modal">
  
  <form class="modal-content animate" action="register.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="container">
      <label for="uname"><b>Name</b></label><br>
      <input type="text" placeholder="Enter name" name="name" required><br>

      <label for="email"><b>Email</b></label><br>
      <input type="text" placeholder="Enter email" name="email" required><br>
      <label for="branch"><b>Branch</b></label><br>
      <input type="text" placeholder="Enter branch" name="branch" required><br>
        
      <input type="submit" class="button" name="submit" value="submit" >
      <input type="submit" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" value="Cancel">
    </div>

  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</div>
</body>
</html>
