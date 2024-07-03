<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $cp=$_POST['cpass'];
    $Phone = $_POST['Phone'];


    //database connection
    $conn = new mysqli('localhost','root','','aviate');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        if($Password===$cp){
        $stmt = $conn->prepare("insert into accounts(Name,Email,Phone,Password)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$Name,$Email,$Phone,$Password);
        $stmt->execute();
        echo "registration succesfull";
        $stmt->close();
        $conn->close();
        header("Location:homepage.php");
        exit;
}else{
echo "Passwords do not match. Please try again.";
}
    }
echo"
<script>
localStorage.setItem('userEmail','$Email');
localStorage.setItem('userPassword','$Password');
</script>";
?>

</body>
</html>