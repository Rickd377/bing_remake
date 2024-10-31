<?php
include 'db_connection.php'; // Include your database connection file

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['order'])) {
    foreach ($data['order'] as $item) {
        $id = $item['id'];
        $order = $item['order'];
        $sql = "UPDATE grid_items SET `order` = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $order, $id);
        $stmt->execute();
    }
}
?>