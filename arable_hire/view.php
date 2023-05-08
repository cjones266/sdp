<?php

// This page is visible to all users to browse machinery for hire.

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
      // Get the search keyword(s) from the user
      $search = $_GET["search"];
      
      // Get the county value from the user
      $county = $_GET["county"];
      
      // Get the category selection from the user
      $category = $_GET["category"];

      // Get the start and end dates selected from the user
      $start_date = $_GET['start_date'];
      $end_date = $_GET['end_date'];
      
      // Prepare the SQL statement
      $sql = "SELECT * FROM advertisements WHERE name LIKE '%" . $search . "%' AND status = 1";
      
      // If selected, add the county filter to the SQL statement
      if (!empty($county)) {
        $sql .= " AND county = '" . $county . "'";
      }
      
      // If selected, add the category filter to the SQL statement
      if (!empty($category)) {
        $sql .= " AND category = '" . $category . "'";
      }
      
      // If selected, add the start and end date to the SQL statement
      if (!empty($start_date) && !empty($end_date)) {
        $sql .= " AND start_date = '" . $start_date . "' AND end_date = '" . $end_date . "'";
      }

      // Execute the query
      $result = $conn->query($sql);
      
      // Check if any results were found
if ($result->num_rows > 0) {
    // Output the results
    echo '<div class="results-container">';
    // Loop through each result and display them as previews in a grid format
    while ($row = $result->fetch_assoc()) {
        echo '<div class="grid-display">';
        echo '<a href="viewForm.php?id=' . $row['id'] . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="300" />';
        echo '<p>' . $row['name'] . '</p>';
        echo '</a></div>';
    }
    echo '</div>';
} else { // Else if no results found
    echo "No listings found.";
}
      // Close the database connection
      $conn->close();
      ?>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>