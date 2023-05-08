<?php

session_start();

/* This page is used to advertise machinery */

// Store the user logged in ID as the session variable (links advertisements to users).
$users_id = $_SESSION['userid'];

include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
// Display an error message if user is not logged in
?>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 main-content">
        <main class="container">
          <h3>Please Login or Sign Up to create a listing.</h3>
        </main>
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  exit();
} else {
  // Display the advertisement form to the user
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 main-content">
        <?php
        // Include form
        include "form.php";
          
        // Include database connection
        include "config.php";
        
        // Process form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Assign values submitted through the form to variables
          $name = $_POST["name"];
          $category = $_POST['category'];
          $description = $_POST['description'];
          $county = $_POST['county']; 
          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];
          $cost = $_POST['cost'];
          $email = $_POST["email"];
          $users_id = intval($_POST['user_id']);

          if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // Get image details and handle image upload
            $file_name = $_FILES["image"]["name"];
            $file_type = $_FILES["image"]["type"];
            $file_size = $_FILES["image"]["size"];
            $file_tmp = $_FILES["image"]["tmp_name"];
              
            // Check image type is allowed
            $allowed_types = array("image/jpg", "image/png", "image/jpeg", "image/gif");
            if (!in_array($file_type, $allowed_types)) {
              echo "Error: Only JPG, PNG, JPEG and GIF file types are allowed.";
            } else {
              // Handle image upload
              $image = addslashes(file_get_contents($file_tmp));
                
              // Insert advertisement data into database
              $sql = "INSERT INTO advertisements (name, category, description, county, start_date, end_date, cost, email, image, user_id) VALUES ('$name', '$category', '$description', '$county', '$start_date', '$end_date', '$cost', '$email', '$image', '$users_id')";
              
              if (mysqli_query($conn, $sql)) {
                // If upload completed successfully, display upload success message.
                $message = "Advertisement created successfully. Your advertisement will be reviewed by an Admin. You can view the status of your submission in your account.";
                $redirect_url = "http://localhost/arable_hire/index.php";
              } else { // Else display error message.
                $message = "Error uploading data: " . mysqli_error($conn);
              }
            }
          } elseif (isset($_POST["no-image"])) {
            // User has chosen to proceed without uploading an image to the advertisement form
            $image = null;
            
            // Insert data into database
            $sql = "INSERT INTO advertisements (name, category, description, county, start_date, end_date, cost, email, image, user_id) VALUES ('$name', '$category', '$description', '$county', '$start_date', '$end_date', '$cost', '$email', '$image', '$users_id')";
            
            if (mysqli_query($conn, $sql)) {
              // If upload completed successfully, display upload success message.
              $message = "Advertisement created successfully. Your advertisement will be reviewed by an Admin. You can view the status of your submission in your account.";
              $redirect_url = "http://localhost/arable_hire/index.php";
            } else { // Else display error message.
              $message = "Error uploading data: " . mysqli_error($conn);
            }
          } else {
            // No image selected and user has not confirmed they want to proceed
            $message = "Error: No image selected. Please select an image or confirm you would like to proceed without an image.";
          }
          
          // Close MySQL connection
          mysqli_close($conn);
          
          // Redirect the user to the index page once the success or error message is displayed.
          if (isset($message)) {
            echo '<script>
            alert("' . $message . '");
            window.location.href = "' . $redirect_url . '";
            </script>';
          }      
        }
        include "footer.php";
      }
        ?>
      </div>
  </div>
</div>