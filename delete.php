<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["variabl"];
    echo $id;
    try {
        $db = new PDO("mysql:host=localhost;dbname=test","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->query("DELETE FROM `tableone` WHERE id=$id");
        // $db>exec($stm);
        echo "Record deleted successfully ".$id;
    } catch(PDOException $e) {
        echo "UPDATED not successfully: " . $e->getMessage();
        }
}
?>
