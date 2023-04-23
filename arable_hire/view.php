<?php

// No logic required as page is visible to all users to browse.

session_start();

include "header.php";

// Include database connection code
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
      // Get the search keyword(s) from the user - SEARCHES THE NAME COLUMN RN
      $search = $_GET["search"];
      
      // Get the county value from the user if selected
      $county = $_GET["county"];
      
      // Get the category selection from the user
      $category = $_GET["category"];

      // Get the start and end dates selected
      $start_date = $_GET['start_date'];
      $end_date = $_GET['end_date'];
      
      // Prepare the SQL statement
      $sql = "SELECT * FROM advertisements WHERE name LIKE '%" . $search . "%' AND status = 1";
      // ERRORS MAY BE TO DO WITH STATUS = 1??
      
      // Add the county filter to the SQL statement, if a county is selected
      if (!empty($county)) {
        $sql .= " AND county = '" . $county . "'";
      }
      
      // Add the category filter to the SQL statement, if a category is selected
      if (!empty($category)) {
        $sql .= " AND category = '" . $category . "'";
      }
      
      // Add the start and end date to the SQL statement if selected
      if (!empty($start_date) && !empty($end_date)) {
        $sql .= " AND start_date = '" . $start_date . "' AND end_date = '" . $end_date . "'";
      }


      // Execute the query
      $result = $conn->query($sql);
      
      // Check if any results were found
if ($result->num_rows > 0) {
    // Output the results container
    echo '<div class="results-container">';
    // Loop through each result and output it as a card
    while ($row = $result->fetch_assoc()) {
        echo '<div class="grid-display">';
        echo '<a href="viewForm.php?id=' . $row['id'] . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="300" />';
        echo '<p>' . $row['name'] . '</p>';
        echo '</a></div>';
    }
    // Close the results container
    echo '</div>';
} else {
    echo "No listings found.";
}
      // Close the database connection
      $conn->close();
      ?>
    </div> <!-- Close the div with class "col-md-9" -->
  </div> <!-- Close the div with class "row" -->
</div> <!-- Close the div with class "container-fluid" -->

<?php
include "footer.php";
?>


<!--

table version

      if ($result->num_rows > 0) {
        // Output the table header
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Search Results</th></tr></thead>';
        
        // Loop through each result and output it as a table row
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td><a href="viewForm.php?id=' . $row['id'] . '">' . $row['name'] . '<br><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="00" /></a></td>';
          echo '</tr>';
        }
        
        // Output the table footer
        echo '</table>';
      } else {
        echo "No listings found.";
      }

    -->