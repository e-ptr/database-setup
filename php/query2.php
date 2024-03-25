<?php

  $servername = "mysql1.cs.clemson.edu";
  $username = "MenagerieDB_wm2d";
  $password = "canvas4620";
  $dbname = "MenagerieDB_igt0";

  // Create database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check database connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query the database
  $sql = "SELECT * FROM pet WHERE sex='f'";
  $result = $conn->query($sql);

  // Display results as a table
  if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
      echo "<td>" . $key . "</td>";
    }
    echo "</tr>";
    foreach ($row as $key => $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<td>" . $value. "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No Result Returned";
  }

  $conn->close();
?>