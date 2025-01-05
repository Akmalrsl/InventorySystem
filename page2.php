<?php
// Database connection details
$host = "localhost"; // Your database host, usually "localhost"
$username = "root"; // Your database username
$password = ""; // Your database password (default for XAMPP)
$database = "inventorysystem"; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the inventory table
$sql = "SELECT TYPE, BRAND, MODEL, PROCESSOR, RAM, `HDD/SSD`, OS, YEAR, PROJECT, QUANTITY, SERIALNUM, PRICE FROM inventory";
$result = $conn->query($sql);

// Check if there are results and generate table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['TYPE']) . "</td>
            <td>" . htmlspecialchars($row['BRAND']) . "</td>
            <td>" . htmlspecialchars($row['MODEL']) . "</td>
            <td>" . htmlspecialchars($row['PROCESSOR']) . "</td>
            <td>" . htmlspecialchars($row['RAM']) . "</td>
            <td>" . htmlspecialchars($row['HDD/SSD']) . "</td>
            <td>" . htmlspecialchars($row['OS']) . "</td>
            <td>" . htmlspecialchars($row['YEAR']) . "</td>
            <td>" . htmlspecialchars($row['PROJECT']) . "</td>
            <td>" . htmlspecialchars($row['QUANTITY']) . "</td>
            <td>" . htmlspecialchars($row['SERIALNUM']) . "</td>
            <td>" . htmlspecialchars($row['PRICE']) . "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No data available in the inventory.</td></tr>";
}

// Close the database connection
$conn->close();
?>
