<!DOCTYPE html>
<html>
<head>
    <title>Simple HTML Page</title>
</head>
<body>
    <h1>Welcome to My Simple HTML Page</h1>
    <p>This is a basic HTML page displayed using PHP.</p>

    <?php
    // Consume the API and display the data
    $apiUrl = 'localhost/iot/api.php?endpoint=data';
    $data = json_decode(file_get_contents($apiUrl), true);

    if (!empty($data)) {
        echo "<h2>Data from API:</h2>";
        echo "<ul>";
        foreach ($data as $row) {
            echo "<li>" . $row['column_name'] . "</li>"; // Replace 'column_name' with the actual column name you want to display
        }
        echo "</ul>";
    } else {
        echo "No data available.";
    }
    ?>
</body>
</html>
