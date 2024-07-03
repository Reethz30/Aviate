<?php
$con = mysqli_connect("localhost", "root", "", "aviate");
if (!$con) {
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    if ($email && $pwd) {
        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($con, "SELECT * FROM accounts WHERE Email = ? AND Password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $email, $pwd);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            header("Location: homepage.php");
            exit;
        } else {
            echo '<script type="text/javascript">
                    alert("Incorrect login credentials. Please try again.");
                  </script>';
        }
    }
}
?>
