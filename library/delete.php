<?php
$id = $_GET['id'];

include 'db.php';
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM booksLib WHERE `id` = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: '.'index.php');
    exit();
} else {
    echo "Error deleting record";
}
?>