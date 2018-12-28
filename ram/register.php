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
<form action="register.php" method='post'>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="branch"><b>Branch</b></label>
    <input type="text" placeholder="Repeat Password" name="branch" required>

    <button type="submit" class="registerbtn" name='submit' value='submit'>Register</button>
  </div>
  

</form>
<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $branch=$_POST['branch'];

        $insert="INSERT INTO `student`.`students` (`id`, `name`, `email`, `branch`) VALUES (NULL, '$name', '$email', '$branch')";
        $inr=mysqli_query($con,$insert);
        if($inr>0){
        echo "<script>alert('student data is updated $inr')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>


  

 
</table>
</div>
</body>
</html>
