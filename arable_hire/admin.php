<?php
session_start();

include "header.php";
include 'config.php';

?>

<!-- Logic to display the admin page only to admin user.
Check if the user is logged in and if their user ID matches the admin ID.
If the user is not logged in or is not the admin, an error message is displayed and they cannot access the page. -->

<?php
    if (isset($_SESSION['userid']) && $_SESSION['userid'] == "2") {
    // Display content for the user with ID 2
    } else {
    // Display an error message

    echo "Error: You are not authorized to access this page.";

    include "footer.php";
    exit();
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
        <a href="#" class="list-group-item active">Pending</a>
        <a href="adminManage.php" class="list-group-item">Manage</a>
      </div>
    </div>
    <div class="col-md-9">

      <h3>Pending Submissions</h3>
      <table class="table">
      
      <?php

      
      // Displays all submissions that have not been accepted or rejected
      //Only selects submissions with a status on Pending (status=0)
      // Therefore, once a submission is approved, its status will updated
      // to status=1 and will no longer be in the query result.
      
      $query = "SELECT id, name, category, description, county, image, cost, start_date, end_date, email, status FROM advertisements WHERE status = 0";
      $result = mysqli_query($conn, $query);
      ?>

        <thead>
          <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>County</th>
            <th>Image</th>
            <th>Available From</th>
            <th>Available To</th>
            <th>Daily Cost</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td class="cell"><?php echo $row['name']; ?></td>
            <td class="cell"><?php echo $row['category']; ?></td>
            <td class="cell"><?php echo $row['description']; ?></td>
            <td class="cell"><?php echo $row['county']; ?></td>
            <td class="cell"><img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>" width="100" height="100"></td>
            <td class="cell"><?php echo $row['start_date']; ?></td>
            <td class="cell"><?php echo $row['end_date']; ?></td>
            <td class="cell"><?php echo $row['cost']; ?></td>
            <td class="cell"><?php echo $row['email']; ?></td>
            <td class="cell"><?php echo $row['status'] == 1 ? 'Approved' : 'Pending'; ?></td>
            <td>
              <form action="approve.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="action" value="approve">Approve</button>
              </form>
              <form action="approve.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="action" value="reject">Reject</button>
              </form>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</main>

<?php
include "footer.php";
?>