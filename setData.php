<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    print_r($_GET);
    $fn = $_GET["fn"];
    $ido = $_GET["ido"];
    $ln = $_GET["ln"];
    $em = $_GET["email"];
    echo $ido;
    echo $ln;
    echo $em;
    try {
        $db = new PDO("mysql:host=localhost;dbname=test","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query("INSERT INTO tableone (firstName,lastName,email) VALUES ('$fn', '$ln', '$em')");
        echo"New record created successfully";
    } catch(PDOException $e) {
        echo "UPDATED not successfully: " . $e->getMessage();
        }
    }
?>