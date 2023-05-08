<?php

// This page displays the full information of an item of machinery once it is selected from the preview grid in view.php.

session_start();

include "header.php";

include "config.php";

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
        <?php
        include "search.php";
        ?>
    </div>
    <div class="col-md-9">
        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $county = $_GET['county'];
            // Prepare the SQL statement
            $sql = "SELECT * FROM advertisements WHERE name LIKE '%" . $search . "%'";
            if (!empty($county)) {
                $sql .= " AND county = '$county'";
            }
            // Execute the query
            $result = $conn->query($sql);
            // Check if any results were found
            if ($result->num_rows > 0) {
                // Output the table header
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Search Results</th></tr></thead>';
                // Loop through each result and output it as a table row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><a href="viewForm.php?id=' . $row['id'] . '">' . $row['name'] . '</a></td>';
                    echo '</tr>';
                }
                // Output the table footer
                echo '</table>';
            } else {
                echo "No forms found.";
            }
        } else {

            $id = $_GET['id'];
            $forms = "SELECT name, category, description, county, start_date, end_date, cost, email, image FROM advertisements WHERE id = $id";
            $result = $conn->query($forms);
            
            // Display the full advertisement in a table
            if ($result->num_rows > 0) {
                // Loop through each result and create a table row for each field of the advertisement
                while($row = $result->fetch_assoc()) {
                  echo '<table class="table table-striped">';
                  echo '<tbody>';
                  echo '<tr><td><strong>Name:</strong></td><td>' . $row['name'] . '</td></tr>';
                  echo '<tr><td><strong>Category:</strong></td><td>' . $row['category'] . '</td></tr>';
                  echo '<tr><td><strong>Description:</strong></td><td>' . $row['description'] . '</td></tr>';
                  echo '<tr><td><strong>County:</strong></td><td>' . $row['county'] . '</td></tr>';
                  echo '<tr><td><strong>Available From:</strong></td><td>' . $row['start_date'] . '</td></tr>';
                  echo '<tr><td><strong>Available Until:</strong></td><td>' . $row['end_date'] . '</td></tr>';
                  echo '<tr><td><strong>Daily Cost:</strong></td><td>' . $row['cost'] . '</td></tr>';
                  echo '<tr><td><strong>Email:</strong></td><td>' . $row['email'] . '</td></tr>';
                  echo '<tr><td><strong>Image:</strong></td><td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" style="width:350px; height:350px;" /></td>';
                  echo '</tbody>';
                  echo '</table>';
                }
              } else {
                echo "Form not found.";
              }

        }
        ?>
    </div>
  </div>
</div>