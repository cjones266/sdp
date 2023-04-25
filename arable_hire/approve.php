<!-- Used by Admin to approve or reject listings -->

<?php
include 'config.php';

$id = $_POST['id'];
$action = $_POST['action'];

// Approve or reject
if ($action == 'approve') {
    $query = "UPDATE advertisements SET status = 1 WHERE id = $id";
} else {

    // Delete the entry from the database.
    $query = "DELETE FROM advertisements WHERE id = $id";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Redirect to admin.php once submission has been approved or rejected to see the remaining submissions for approval.
header("Location: admin.php");
exit();

// Close the connection
mysqli_close($conn);