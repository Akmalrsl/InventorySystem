<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "inventorysystem";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!empty($data['data'])) {
    $headers = $data['data'][0]; // First row contains headers
    $rows = array_slice($data['data'], 1); // Remaining rows contain data

    foreach ($rows as $row) {
        // Prepare columns and values dynamically
        $columns = "`" . implode("`, `", $headers) . "`";
        $values = array_map(function ($value) use ($conn) {
            return "'" . $conn->real_escape_string($value) . "'";
        }, $row);
        $values = implode(", ", $values);

        // Construct SQL query
        $sql = "INSERT INTO users ($columns) VALUES ($values)";

        // Execute query and check for errors
        if (!$conn->query($sql)) {
            echo "Error: " . $conn->error . "<br>";
        }
    }
    echo "Data uploaded successfully!";
} else {
    echo "No data received.";
}

$conn->close();
?>
