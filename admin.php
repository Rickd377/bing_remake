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

function parse_ids($input) {
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
        $span_class = isset($_POST['span_2']) ? 'span-2' : '';
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
            background-color: lightblue;
            background-image: none;
        }
        h2, h3 {
            margin-bottom: 10px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .span-2 {
            grid-column: span 2;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
            height: 100%;
            padding: 0 20px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="logout.php">Logout</a>
    <h3>Add Slider Item</h3>
    <form method="post" action="admin.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url" required>
        <button type="submit" name="add_slider">Add Slider Item</button>
    </form>

    <h3>Add Grid Item</h3>
    <form method="post" action="admin.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url">
        <label for="upload_time">Upload Time:</label>
        <input type="text" id="upload_time" name="upload_time">
        <label for="likes">Likes:</label>
        <input type="number" id="likes" name="likes">
        <label for="comments">Comments:</label>
        <input type="number" id="comments" name="comments">
        <label for="span_2">Span 2:</label>
        <input type="checkbox" id="span_2" name="span_2"><br><br>
        <button type="submit" name="add_grid">Add Grid Item</button>
    </form>

    <h3>Delete Slider Items</h3>
    <form method="post" action="admin.php">
        <label for="ids">IDs (comma-separated or range):</label>
        <input type="text" id="ids" name="ids" required>
        <button type="submit" name="delete_slider">Delete Slider Items</button>
    </form>

    <h3>Delete Grid Items</h3>
    <form method="post" action="admin.php">
        <label for="ids">IDs (comma-separated or range):</label>
        <input type="text" id="ids" name="ids" required>
        <button type="submit" name="delete_grid">Delete Grid Items</button>
    </form>

    <h3>Current Slider Items</h3>
    <ul>
        <?php while ($row = $slider_items->fetch_assoc()): ?>
            <li><?php echo $row['id'] . ': ' . $row['title']; ?></li>
        <?php endwhile; ?>
    </ul>

    <h3>Current Grid Items</h3>
    <ul>
        <?php while ($row = $grid_items->fetch_assoc()): ?>
            <li><?php echo $row['id'] . ': ' . $row['title']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>