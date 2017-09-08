<?php 
    include("settings.php"); 

    $conn = new mysqli($db, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $create_db_sql = "CREATE DATABASE IF NOT EXISTS {$dbname}";
    if ($conn->query($create_db_sql) === TRUE) {
        echo "Database created successfully ";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->select_db($dbname);
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(60) NOT NULL,
            email VARCHAR(50),
            phone VARCHAR(50),
            state VARCHAR(50),
            upload_file VARCHAR(100),
            link VARCHAR(150),
            newsletter VARCHAR(10)
        )";
    if ($conn->query($sql) === TRUE) {
        echo "Table {$table_name} created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>