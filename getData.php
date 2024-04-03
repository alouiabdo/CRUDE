<?php
    
        try {
            $db = new PDO("mysql:host =localhost;dbname=test","root","");
            $stm = $db->prepare("SELECT * FROM `tableone`");
            $stm ->execute();
            $rep =  $stm -> fetchAll();
            echo "<table>";
            echo "<tr>";
            echo "<th> FirstName </th>";
            echo "<th> LastName </th>";
            echo "<th> Email </th>";
            echo "<th> ID </th>";
            echo "<th> Modifie </th>";
            echo "<th> Delete</th>";
            echo "</tr>";
            foreach( $rep as $row ) {
                echo "<tr>
                        <td class='FN'>{$row['firstName']}</td>
                        <td class='LN'>{$row['lastName']}</td>
                        <td class='EMAIL'>{$row['email']}</td>
                        <td>{$row['id']}</td>
                        <td><img class = 'modefie'  src='modifie-removebg-preview.png' alt={$row['id']}></td>
                        <td><img class = 'delete' src='Delete Icone.png' alt={$row['id']}></td>
                    </tr>";
            };
            echo "</table>";
        }catch(PDOException $e) {
            echo "note valied";
        }
?>