<?php 
mysqli_report(MYSQLI_REPORT_STRICT);

try{
    $mysqli = new mysqli("localhost", "root", "");

    $mysqli->select_db("ilkoom");
    if ($mysqli->error){
        throw new Exception();
    }

    $query = "SELECT 1 FROM user";
    $mysqli->query($query);
        if($mysqli->error){
            throw new Exception();

    }

    if(isset($mysqli)){
        $mysqli->close();
    }
    header('Location:login.php');
}
catch (Exception $e){
    ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
 </head>
 <body>
    
    <div>
        <div>

        <h3>Selamat datang di Aplikasi <strong>Stock Manager</strong> </h3>

        </div>
    </div>

 </body>
 </html>


<?php

    }

?>