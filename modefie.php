<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["variabl"];
    echo $id;
    $sub = $_POST["sub"];
}
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
        $stm = $db->prepare("UPDATE `tableone` SET firstName=:fn, lastName=:ln, email=:email WHERE id=:id");
        $stm->bindParam(':fn', $fn);
        $stm->bindParam(':ln', $ln);
        $stm->bindParam(':email', $em);
        $stm->bindParam(':id', $ido);
        $stm->execute();
        echo "true";
        header("Refresh: 5; url=".$_SERVER['PHP_SELF']);
    } catch(PDOException $e) {
        echo "UPDATED not successfully: " . $e->getMessage();
        }
    }
?>
