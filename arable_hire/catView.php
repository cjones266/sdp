<!-- This file is used for the categories search -->

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
 
      $sql = "SELECT category FROM advertisements";

      $result = mysqli_query($connection, $sql);

      echo '<ul>';
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<li><a href="view.php?category=' . urlencode($row['category']) . '">' . $row['category'] . '</a></li>';
      }
      echo '</ul>';

      $category = $_GET['category'];

      $query = "SELECT * FROM advertisements WHERE category='$category'";

      $result = mysqli_query($connection, $query);


      while ($row = mysqli_fetch_assoc($result)) {
      }

      ?>
    </div>
  </div>
</div>

