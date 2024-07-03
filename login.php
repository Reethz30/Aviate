<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="left">
        <p style="color:white;">Adventure awaits!<br>Sign in to discover exclusive flight deals and incredible destinations</p>
    </div>
    <div class="right">
        <div><h1>LOGIN</h1></div>
        <form id="loginForm" action="l.php">
            <label>
                EMAIL:        
                <input type="email" id="email" name="email" required>
            </label><br>
            <label>
                PASSWORD: 
                <input type="password" id="password" name="password"> <!-- Add an "id" to the password field -->
            </label><br>
            <div id="forget">
                <a href="#">FORGOT PASSWORD??</a>
            </div>
            <div id="submit" onclick="home()">
                <input type="submit" value="LOGIN">
            </div>
        </form>

        <script>
            document.getElementById("loginForm").addEventListener("submit", function(event) {
                event.preventDefault();
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const email = emailInput.value;
                const password = passwordInput.value;

                const storedEmail = localStorage.getItem('userEmail');
                const storedPassword = localStorage.getItem('userPassword');
     if(email === storedEmail && password === storedPassword)
window.location.href = "homepage.php";
else
alert("Incorrect login credentials. Please try again.");
                
            });
        </script>
    </div>
</body>

</html>
