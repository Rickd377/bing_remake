<?php
session_start();
include 'db_connection.php'; // Include your database connection file

if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

$type = $_GET['type'];
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        if ($type == 'slider') {
            $sql = "DELETE FROM slider_items WHERE id = ?";
        } elseif ($type == 'grid') {
            $sql = "DELETE FROM grid_items WHERE id = ?";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header("Location: admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        $title = $_POST['title'];
        $image_url = $_POST['image_url'];

        if ($type == 'slider') {
            $sql = "UPDATE slider_items SET title = ?, image_url = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssi', $title, $image_url, $id);
        } elseif ($type == 'grid') {
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
            $sql = "UPDATE grid_items SET title = ?, image_url = ?, upload_time = ?, likes = ?, comments = ?, span_class = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssissi', $title, $image_url, $upload_time, $likes, $comments, $span_class, $id);
        }

        if ($stmt->execute()) {
            header("Location: admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
} else {
    if ($type == 'slider') {
        $sql = "SELECT * FROM slider_items WHERE id = ?";
    } elseif ($type == 'grid') {
        $sql = "SELECT * FROM grid_items WHERE id = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #2f5de6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        .form-container button:hover {
            background-color: #254bb5;
        }
        .form-container .check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .form-container .check label {
            margin-left: 10px;
        }
        .form-container .delete-button {
            background-color: #e74c3c;
            margin-top: 10px;
        }
        .form-container .delete-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form method="post" action="edit_item.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>">
            <h2>Edit <?php echo ucfirst($type); ?> Item</h2>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required>
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($item['image_url']); ?>" required>
            <?php if ($type == 'grid'): ?>
                <label for="upload_time">Upload Time:</label>
                <input type="text" id="upload_time" name="upload_time" value="<?php echo htmlspecialchars($item['upload_time']); ?>">
                <label for="likes">Likes:</label>
                <input type="number" id="likes" name="likes" value="<?php echo htmlspecialchars($item['likes']); ?>">
                <label for="comments">Comments:</label>
                <input type="number" id="comments" name="comments" value="<?php echo htmlspecialchars($item['comments']); ?>">
                <div class="check">
                    <input type="checkbox" id="span_2" name="span_2" <?php echo strpos($item['span_class'], 'span-2') !== false ? 'checked' : ''; ?>>
                    <label for="span_2">Span 2</label>
                </div>
                <div class="check">
                    <input type="checkbox" id="span_id_2" name="span_id_2" <?php echo strpos($item['span_class'], 'span-id-2') !== false ? 'checked' : ''; ?>>
                    <label for="span_id_2">Span ID 2</label>
                </div>
            <?php endif; ?>
            <button type="submit">Save Changes</button>
            <button type="submit" name="delete" class="delete-button">Delete Item</button>
        </form>
    </div>
</body>

</html>