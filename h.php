<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $flightType = $_POST["flightType"];
    $fromAirport = $_POST["from"];
    $toAirport = $_POST["to"];
    $departureDate = $_POST["departureDate"];
    $returnDate = !empty($_POST["returnDate"]) ? $_POST["returnDate"] : '0';
    $passengers = $_POST["pass"];
    $fareType = $_POST["fare"];


    //database connection
    $conn = new mysqli('localhost','root','','aviate');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        if(isset($_POST["flightType"]) && !empty($_POST["flightType"])){
        $selectedtype = $_POST["flightType"];
}
        if(isset($_POST["fare"]) && !empty($_POST["fare"])){
        $selectedfare = $_POST["fare"];
}
        if (isset($_POST["from"]) && !empty($_POST["from"])) {
        $selectedfrom = $_POST["from"];
}
        if (isset($_POST["to"]) && !empty($_POST["to"])) {
        $selectedto = $_POST["to"];
}
        $stmt = $conn->prepare("insert into details(Type,FromAirport,ToAirport,Departure,ReturnDate,Passengers,Fare)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssis",$selectedtype,$selectedfrom,$selectedto,$departureDate,$returnDate,$passengers,$selectedfare);
        $stmt->execute();
        echo "registration succesfull";
        $stmt->close();
        $conn->close();
        header("Location:book.php");
        exit;

    }
?>

</body>
</html>