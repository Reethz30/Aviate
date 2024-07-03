<!DOCTYPE html>
<html>
<head>
	<title>Signup Form</title>
	<style>
		/* CSS for the main container */
.main-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
  max-width: 1000px;
  margin: 0 auto;
  padding: 20px;
}

/* Style for the "Create Account" text */
h2 {
  width: 100%;
  text-align: center;
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
  margin-right:500px;
}

/* Style for the container holding the form */
.container {
  flex: 1;
  margin-right: 20px;
  padding: 20px;
  background-color: #f2f2f2;
}

/* Style for the labels */
label {
  display: block;
  margin-bottom: 5px;
}

/* Style for the input fields */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style for the submit button */
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Style for the right section */
.right {
  flex: 1;
  padding: 20px;
  width:50vw;
    float: right;

    margin-top:100px;
    margin-left:80px;
    margin-right:-200px;
}

/* Style for the headings in the right section */
.right h3 {
    color:black;
    font-size:larger;
    font-weight: 700;
}

.right h1 {
    color:black;
    font-size:4rem;
    font-weight: 700;
   font-family: Arial, Helvetica, sans-serif;
}
#sign{
    margin-left:200px;
}
p{
    text-align:center;
}

	</style>
</head>
<body>
    <div class="main-container">
        <h2>Create Account</h2>
<div class="container">        
                <form action="s1.php" method="post">
                    
                    
		<label for="name">Name:</label>
		<input type="text" id="name" name="Name" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="Email" required>

        <label for="phone">Phone:</label>
		<input type="tel" id="phone" name="Phone" pattern="[0-9]{10}" required>

		<label for="password">Password:</label>
		<input type="password" id="password" name="Password" minlength="8" required>

		<label for"cpass">Confirm Password:</label>
        <input type="password" id="cpass" name="cpass" minlength="8" required>

		<input type="submit" value="SIGN UP" id="sign" name="submit">

    
	</form>
    <p class="login-text">Already have an account? <a href="login.php">Login</a></p>          
                   
        
        </div>
      <div class="right">
        <h1>NEW HERE?</h1>
        <h3>Discover the Joy of Travel. Join Our Community!</h3>
      </div>
</div>
<script>
function store(){
                const e=document.getElementByName('em').value;
                const p=document.getElementById('ph').value;
                const p1=document.getElementById('pass1').value;
                const p2=document.getElementById('cp').value;
                if(p1==p2){
                localStorage.setItem('userEmail', e);
                localStorage.setItem('userPassword',p1);
                }
              }
        document.getElementById("signupform").addEventListener("submit", function(event) {
          event.preventDefault();
            store();
            this.submit();
            window.location.href = "homepage.html";
        });
</script>
    </body>
<?php
session_start();

// initializing variables
$name = "";
$Email    = "";
$errors = array();
$Password=""; 
$c=0;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'aviate');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $ph = mysqli_real_escape_string($db, $_POST['Phone']);
  $Password = mysqli_real_escape_string($db, $_POST['Password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['cpass']);

  
  if ($Password != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  
  $user_check_query = "SELECT * FROM accounts WHERE Email='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['Email'] === $Email) {
      echo '<script> alert("Email already exists")</script>';
$c=1;

    }
  }

  // Finally, register user if there are no errors in the form
  if ($c == 0) {  

  	$query = "insert into accounts(Name,Email,Phone,Password) values($name,$Email,$ph,$Password)";  			 
  	mysqli_query($db, $query);
  	$_SESSION['Name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: homepage.html');
  }
}
echo"
<script>
localStorage.setItem('userEmail','$Email');
localStorage.setItem('userPassword','$Password');
</script>";
?>

    </html>