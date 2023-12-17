<?php
include 'conn.php';

$data = array();

// Handle search query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = !empty($search) ? " WHERE post LIKE '%$search%'" : '';

$sql = "SELECT * FROM `discussion`" . $search_condition . " ORDER BY id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

while ($row = $result->fetch()) {
    array_push($data, $row);
}

echo json_encode($data);

$conn = null;
exit();
?>
