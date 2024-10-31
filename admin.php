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

$slider_items = $conn->query("SELECT * FROM slider_items");
$grid_items = $conn->query("SELECT * FROM grid_items ORDER BY `order` ASC");
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
            padding: 0;
        }
        .general-container {
            width: 100%;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: absolute;
            left: 0;
        }
        .items-wrapper {
            margin-bottom: 20px;
        }
        .items-wrapper h3 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }
        .items-wrapper button {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #2f5de6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }
        .items-wrapper button:hover {
            background-color: #254bb5;
        }
        .items-row {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .items-row li {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .items-row li .edit-button {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #2f5de6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .items-row li .edit-button:hover {
            background-color: #254bb5;
        }
        .items-row li .select-checkbox {
            margin-right: 10px;
        }
        .items-row li.selected {
            background-color: #e0e0e0;
        }
        .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .item-details span {
            margin-bottom: 5px;
        }

        .change-button {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #2f5de6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .change-button:hover {
            background-color: #254bb5;
        }
    </style>
</head>

<body>
    <button class="change-button" onclick="switchItems()">Confirm Switch</button>
    <div class="general-container">
        <div class="items-wrapper">
            <h3>Current Slider Items</h3>
            <button onclick="location.href='add_item.php?type=slider'">Add New Slider Item</button>
            <ul class="items-row" id="slider-items">
                <?php while ($row = $slider_items->fetch_assoc()): ?>
                    <li data-id="<?php echo $row['id']; ?>">
                        <input type="checkbox" class="select-checkbox">
                        <div class="item-details">
                            <span>ID: <?php echo $row['id']; ?></span>
                            <span>Title: <?php echo $row['title']; ?></span>
                            <span>Image URL: <?php echo $row['image_url']; ?></span>
                        </div>
                        <button class="edit-button" onclick="location.href='edit_item.php?type=slider&id=<?php echo $row['id']; ?>'">Edit</button>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="items-wrapper">
            <h3>Current Grid Items</h3>
            <button onclick="location.href='add_item.php?type=grid'">Add New Grid Item</button>
            <ul class="items-row grid" id="grid-items">
                <?php while ($row = $grid_items->fetch_assoc()): ?>
                    <li data-id="<?php echo $row['id']; ?>">
                        <input type="checkbox" class="select-checkbox">
                        <div class="item-details">
                            <span>ID: <?php echo $row['id']; ?></span>
                            <span>Title: <?php echo $row['title']; ?></span>
                            <span>Span Class: <?php echo $row['span_class']; ?></span>
                            <span>Image URL: <?php echo $row['image_url']; ?></span>
                        </div>
                        <button class="edit-button" onclick="location.href='edit_item.php?type=grid&id=<?php echo $row['id']; ?>'">Edit</button>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <script>
        function switchItems() {
            const checkboxes = document.querySelectorAll('.select-checkbox:checked');
            if (checkboxes.length === 2) {
                const li1 = checkboxes[0].parentElement;
                const li2 = checkboxes[1].parentElement;
                const parent = li1.parentElement;

                const index1 = Array.from(parent.children).indexOf(li1);
                const index2 = Array.from(parent.children).indexOf(li2);

                if (index1 > index2) {
                    parent.insertBefore(li1, li2);
                } else {
                    parent.insertBefore(li2, li1);
                }

                updateOrder(parent);
                checkboxes.forEach(checkbox => checkbox.checked = false);
            } else {
                alert('Please select exactly two items to switch.');
            }
        }

        function updateOrder(container) {
            const items = container.querySelectorAll('li');
            const order = Array.from(items).map((item, index) => ({
                id: item.getAttribute('data-id'),
                order: index + 1
            }));

            fetch('update_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ order })
            });
        }
    </script>
</body>

</html>