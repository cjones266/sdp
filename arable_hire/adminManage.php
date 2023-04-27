<?php
session_start();

// Gets the user logged in ID as the session variable.
$users_id = $_SESSION['userid'];

include "header.php";
include 'config.php';


/*This page is used by the admin to manage all approved listings.
This shows the listings once they have been approved (status=1 below).
All listings made by all users will show to be managed. 



Logic to display the admin page only to admin user.
Check if the user is logged in and if their user ID matches the admin ID.
If the user is not logged in or is not the admin, an error message is displayed and they cannot access the page.*/

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
                <a href="admin.php" class="list-group-item">Pending</a>
                <a href="adminManage.php" class="list-group-item active">Manage</a>
            </div>
        </div>
        <div class="col-md-9">
            <h3>Manage All Listings</h3>
            <table class="table">
                <?php
                // Handle submission deletion
                if (isset($_POST['delete'])) {
                    $id = $_POST['id'];
                    // Delete the submission from the database
                    $query = "DELETE FROM advertisements WHERE id = $id";
                    $result = mysqli_query($conn, $query);
                    // Check if the query was successful
                    if ($result) {
                        echo "Listing $id has been deleted.";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }


// Fetch all approved submissions.

$query = "SELECT id, name, category, description, county, image, cost, start_date, end_date, email, status FROM advertisements WHERE status = 1";
//$query = "SELECT id, name, email, image, category, status FROM advertisements WHERE status = 1";
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
                <form action="adminManage.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
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