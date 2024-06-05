<?php
include_once('include/connection.php');

// SQL query to fetch data from the "food" table
$sql = "SELECT foodId,foodname,amount FROM food right join menufood on menufood.id =food.foodid  where status =2  ORDER by `created_at`;";
$result = $con->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    $data = array(); // Initialize an empty array to hold the data
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $foodId = $row['foodId'];
        $foodname = $row['foodname'];
        $amount = $row['amount'];
            $data[] = array(
            'Food ID' => $foodId,
            'Food Name' => $foodname,
            'Amount' => $amount
        );
    }
    
    // Convert the array to JSON format
    $jsonData = json_encode($data);
    if ($jsonData === false) {
        echo "Failed to encode JSON data.";
    } else {
        // Set the response headers
        header('Content-Type: application/json');
        
        // Output the JSON data
        echo $jsonData;
    }
} else {
    echo "No data found in the 'food' table.";
}

// Close the database connection
$con->close();
?>
