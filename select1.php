<?php
$db = mysql_connect('localhost', 'root', '') or die('Unable to connect');
mysqli_select_db($db, 'inventorysystem') or die(mysqli_error($db))

$query = 'SELECT users.BRAND FROM BRAND';

$result = mysqli_query($db, $query) or die(mysqli_error($db))

while($row = mysqli_fetch_array($result)){
    extract($row);
    echo $BRAND;
}
?>