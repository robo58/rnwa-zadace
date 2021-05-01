<?php

    $db = new mysqli("127.0.0.1","root","");
    $s = $_REQUEST["s"];
    if($db) {
        $result = $db->select_db("rnwa") or die("Doslo je do problema prilikom odabira baze...");
            if (strlen($s)!==0){
            $s = strtolower($s);
                $result2 =$db->query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM post p INNER JOIN registration r ON p.rid=r.rid WHERE p.PCONTENT LIKE '%$s%'") or die("Doslo je do problema prilikom izvrsavanja upita...");
            }else{
                $result2 =$db->query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM post p INNER JOIN registration r ON p.rid=r.rid") or die("Doslo je do problema prilikom izvrsavanja upita...");
        }
        $n=$result2->num_rows;
        if ($n > 0){
            echo "<table>
            <tr>
            <th>#</th>
            <th>Sadržaj</th>
            <th>Autor</th>
            <th>Datum</th>
            </tr>";
            while($row = mysqli_fetch_array($result2)) {
                echo "<tr>";
                echo "<td>" . $row['pid'] . "</td>";
                echo "<td>" . $row['pcontent'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "Nema rezultata<br>";
        }
    }
    else {
        echo "<br>Nije proslo spajanje<br>";
    }

mysqli_close($db);
