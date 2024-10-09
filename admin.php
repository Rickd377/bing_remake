<?php
session_start();
include 'db_connection.php'; // Include your database connection file

if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

$email = $_SESSION['email'];
$sql = "SELECT is_admin FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user['is_admin']) {
    header("Location: index.php");
    exit();
}

function parse_ids($input)
{
    $ids = [];
    $parts = explode(',', $input);
    foreach ($parts as $part) {
        $part = trim($part);
        if (strpos($part, '-') !== false) {
            list($start, $end) = explode('-', $part);
            $start = (int)trim($start);
            $end = (int)trim($end);
            $ids = array_merge($ids, range($start, $end));
        } else {
            $ids[] = (int)$part;
        }
    }
    return $ids;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_slider'])) {
        $title = $_POST['title'];
        $image_url = $_POST['image_url'];
        $sql = "INSERT INTO slider_items (title, image_url) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $title, $image_url);
        $stmt->execute();
    } elseif (isset($_POST['add_grid'])) {
        $title = $_POST['title'];
        $image_url = $_POST['image_url'];
        $upload_time = $_POST['upload_time'];
        $likes = $_POST['likes'];
        $comments = $_POST['comments'];
        $span_class = '';
        if (isset($_POST['span_2'])) {
            $span_class .= 'span-2 ';
        }
        if (isset($_POST['span_id_2'])) {
            $span_class .= 'span-id-2';
        }
        $sql = "INSERT INTO grid_items (title, image_url, upload_time, likes, comments, span_class) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssiss', $title, $image_url, $upload_time, $likes, $comments, $span_class);
        $stmt->execute();
    } elseif (isset($_POST['delete_slider'])) {
        $ids = parse_ids($_POST['ids']);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM slider_items WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat('i', count($ids)), ...$ids);
        $stmt->execute();
    } elseif (isset($_POST['delete_grid'])) {
        $ids = parse_ids($_POST['ids']);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM grid_items WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat('i', count($ids)), ...$ids);
        $stmt->execute();
    }
}

$slider_items = $conn->query("SELECT * FROM slider_items");
$grid_items = $conn->query("SELECT * FROM grid_items");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: whitesmoke;
            background-image: none;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="general-container">
        <div class="input-wrapper">
            <h2>Admin Dashboard</h2>
            <a href="logout.php">Logout</a><br><br>
            <h3>Add Slider Item</h3>
            <form method="post" action="admin.php">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="image_url">Image URL:</label>
                <input type="text" id="image_url" name="image_url" required>
                <button type="submit" name="add_slider">Add Slider Item</button>
            </form>
            <h3>Delete Slider Items</h3>
            <form method="post" action="admin.php">
                <label for="ids">IDs (comma-separated or range):</label>
                <input type="text" id="ids" name="ids" required>
                <button type="submit" name="delete_slider">Delete Slider Items</button>
            </form>
        </div>

        <div class="input-wrapper">
            <h3>Add Grid Item</h3>
            <form method="post" action="admin.php">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="image_url">Image URL:</label>
                <input type="text" id="image_url" name="image_url">
                <label for="upload_time">(Don't add if span-2) Upload Time:</label>
                <input type="text" id="upload_time" name="upload_time">
                <label for="likes">Likes:</label>
                <input type="number" id="likes" name="likes">
                <label for="comments">Comments:</label>
                <input type="number" id="comments" name="comments">
                <div class="check">
                    <label for="span_2">(Don't add if normal) Span 2:</label>
                    <input type="checkbox" id="span_2" name="span_2">
                </div>
                <div class="check">
                    <label for="span_id_2">(Don't add if normal) Gradient:</label>
                    <input type="checkbox" id="span_id_2" name="span_id_2">
                </div>
                <button type="submit" name="add_grid">Add Grid Item</button>
            </form>

            <h3>Delete Grid Items</h3>
            <form method="post" action="admin.php">
                <label for="ids">IDs (comma-separated or range):</label>
                <input type="text" id="ids" name="ids" required>
                <button type="submit" name="delete_grid">Delete Grid Items</button>
            </form>
        </div>
    </div>
    <div class="display-items">
        <div class="items-wrapper">
            <h3>Current Slider Items</h3>
            <ul class="items-row">
                <?php while ($row = $slider_items->fetch_assoc()): ?>
                    <li><?php echo $row['id'] . ': ' . $row['title']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="items-wrapper">
            <h3>Current Grid Items</h3>
            <ul class="items-row grid">
                <?php while ($row = $grid_items->fetch_assoc()): ?>
                    <li><?php echo $row['id'] . ': ' . $row['title']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>

</html>