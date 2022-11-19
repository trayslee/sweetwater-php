<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
 server with default setting (user 'root' with no password) */
//echo phpinfo();
$connct = mysqli_connect("localhost", "root", "password", "sweetwater") or die ("Connection failed: " . mysqli_connect_error());

// Check connection
if($connct === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Print host information
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
echo "Connect Successfully. Host info: " . mysqli_get_host_info($connct);

//Create sql string to run to extract the orderid and comment from the sweetwater-test table
$selectSql = "SELECT orderid, comments FROM sweetwater.sweetwater_test where comments like '%Expected Ship Date%'"; 
$query = mysqli_query($connct, $selectSql);
if ($query){
    
    echo "<table border='1'>";
    echo "<tr><td><b>" .  "Row about Candy"  . "</b></tr></td>";
    while ($row = mysqli_fetch_array($query))
    {
        // Retrieve the comment column from tuple
        $comment = $row['comments'];
        // Extract the date from the returned comment and ensure it only the date
        $realDate = substr ($comment, strpos($comment, "Expected Ship Date: ") + strlen("Expected Ship Date: "));
        $realDate = substr ($realDate, 0, 8);
        // Retrieve the orderid column from tuple
        $orderid = $row['orderid'];
        
        echo "Derived Date: ".$realDate . "orderid: " . $orderid;
        //Create sql string to perform update to the order ship date
        $updateSql = "UPDATE sweetwater.sweetwater_test SET shipdate_expected = '$realDate' where orderid = $orderid";
        $updateQuery = mysqli_query($connct, $updateSql);
         
    }
    echo "</table>";
}
else {
    echo "It failed";
}

?>