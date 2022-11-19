<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
 server with default setting (user 'root' with passowrd of 'password') */
$connct = mysqli_connect("localhost", "root", "password", "sweetwater") or die ("Connection failed: " . mysqli_connect_error());

// Check connection
if($connct === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($connct);

//Create a query to locate all rows containing string Candy and format rows into a grid in browser
$sql = "SELECT comments FROM sweetwater.sweetwater_test where comments like '%candy%'"; // (first_name, last_name, last_update) Values ('PETER', 'BOLA', '2022-11-17 02:46:00')";
 $query = mysqli_query($connct, $sql);
if ($query){
    
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Candy"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {
      echo "<tr><td>" .  htmlspecialchars($row['comments']) . "</tr></td>";
    }
    echo "</table>";
}
else {
    echo "It failed";
}

//Create a query to locate all rows containing string Call Me and format rows into a grid in browser
$sql1 = "SELECT comments FROM sweetwater.sweetwater_test where comments like '%call me%'"; // (first_name, last_name, last_update) Values ('PETER', 'BOLA', '2022-11-17 02:46:00')";
$query = mysqli_query($connct, $sql1);
if ($query){
    
    echo "<br><br><br>";
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Call Me"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {
         echo "<tr><td>" .  htmlspecialchars($row['comments']) . "</tr></td>";
    }
    echo "</table>";
}
else {
    echo "It failed";
}

//Create a query to locate all rows containing string Referred Me and format rows into a grid in browser
$sql2 = "SELECT comments FROM sweetwater.sweetwater_test where comments like '%referred me%'"; // (first_name, last_name, last_update) Values ('PETER', 'BOLA', '2022-11-17 02:46:00')";
$query = mysqli_query($connct, $sql2);
if ($query){
    
    echo "<br><br><br>";
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Referred Me"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {

            echo "<tr><td>" .  htmlspecialchars($row['comments']) . "</tr></td>";
    }
    echo "</table>";
}
else {
    echo "It failed";
}

//Create a query to locate all rows containing string Signature Requirement and format rows into a grid in browser
$sql3 = "SELECT comments FROM sweetwater.sweetwater_test where comments like '%signature requirement%'"; // (first_name, last_name, last_update) Values ('PETER', 'BOLA', '2022-11-17 02:46:00')";
$query = mysqli_query($connct, $sql3);
if ($query){
    
    echo "<br><br><br>";
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Signature Required"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {
        echo "<tr><td>" .  htmlspecialchars($row['comments']) . "</tr></td>";
    }
    echo "</table>";
}
else {
    echo "It failed";
}

//Create a query to locate all rows that do not contain the above strings and format rows into a grid in browser
$sql4 = "SELECT comments FROM sweetwater.sweetwater_test where comments not like '%candy%' && comments not like '%call me%' && comments not like '%referred me%' && comments not like '%signature requirement%'"; // (first_name, last_name, last_update) Values ('PETER', 'BOLA', '2022-11-17 02:46:00')";
$query = mysqli_query($connct, $sql4);
if ($query){
    echo "<br><br><br>";
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Everything Else"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {
        echo "<tr><td>" .  htmlspecialchars($row['comments']) . "</tr></td>";
    }
    echo "</table>";
}
else {
    echo "It failed";
}


?>