<?php

  $servername = "mysql1.cs.clemson.edu";
  $username = "MenagerieDB_wm2d";
  $password = "canvas4620";
  $dbname = "MenagerieDB_igt0";

  // Create database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check database connection
  if (mysqli_connect_errno()) {
    die("Connection failed: " . my_sql_connect_error());
  }

  // Query the database
  $sql = "SELECT sex,count(*) AS num FROM pet GROUP BY sex";
  $result = mysqli_query($conn, $sql);

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