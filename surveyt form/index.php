<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database server failed due to" .
    mysqli_connect_error());
}
//echo "success connecting to the db"

$name = $_POST['name'];
$age  = $_POST['age'];
$college = $_POST['college'];
$email = $_POST['mail'];
$nmb = $_POST['nmb'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `crm_first`.`survey` (`name`, `age`, `college`, `email`, `nmb`, `other`, `dt`) VALUES ('$name',
    '$age', '$college', '$email', '$nmb', '$desc', current_timestamp());";

//executing the query

if($con->query($sql) == true){
    echo "SUCCESSFULLY INSERTED";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
//close the connection
$con->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <h1>This is a survey FORM</h1>
            <p>enter ur details to submit the form</p>
            <?php
            if($insert == true){
                echo "<p class = 'submitmsg'> thanks for submiting the form</p>";
            }
            ?>
            <input id="name" type="text" name="name" placeholder="enter ur name">
            <input id="age" type="number" name="age" placeholder="enter ur age">
            <input id="college" type="text" name="college" placeholder="enter ur college name">
            <input id="mail" type="email" name="mail" placeholder="enter ur email">
            <input id="nmb" type="number" name="nmb" placeholder="enter ur phone number">
            <textarea id="desc" name="desc" name="desc" cols="30" rows="10" placeholder="likh do kuch likhne ka ho to"></textarea>
            <button class="btn" id="btn">Submit</button>
        </form>
    </div>

    

</body>

</html>