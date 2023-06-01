<!DOCTYPE html>
<html>
<head>
    <title>Simple HTML Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        .data-list {
            list-style: none;
            padding: 0;
        }

        .data-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Welcome to My Simple HTML Page</h1>
    <h2>Create New Order</h2>

    <form class="order-form" action="/iot/api.php" method="POST">
        <label for="cantidad">Quantity:</label>
        <input type="text" id="cantidad" name="cantidad" required>

        <label for="client">Client:</label>
        <input type="text" id="client" name="client" required>

        <input type="submit" value="Create Order">
    </form>
    <?php
    // Consume the API and display the data
    $apiUrl = '/iot/api.php?endpoint=data';
    $data = json_decode(file_get_contents($apiUrl), true);


    if (!empty($data)) {
        echo "<h2>Data from API:</h2>";
        echo "<ul class='data-list'>";
        foreach ($data as $row) {
            echo "<li class='data-item'>" . $row['column_name'] . "</li>"; // Replace 'column_name' with the actual column name you want to display
        }
        echo "</ul>";
    } else {
        echo "No data available.";
    }
    ?>
</body>
</html>
