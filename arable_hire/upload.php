<?php

session_start();

// Stores the user logged in ID as the session variable.
$users_id = $_SESSION['userid'];

// Include form code
include "header.php";

// check if the user is logged in
if (!isset($_SESSION['userid'])) {

// display an error message to the user if they are not logged in
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
  // if a user is logged in
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 main-content">
        <?php
        // Include form code
        include "form.php";
          
        // Include database connection code
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
            // Get file details and handle file upload
            $file_name = $_FILES["image"]["name"];
            $file_type = $_FILES["image"]["type"];
            $file_size = $_FILES["image"]["size"];
            $file_tmp = $_FILES["image"]["tmp_name"];
              
            // Check file type
            $allowed_types = array("image/jpg", "image/png", "image/jpeg", "image/gif");
            if (!in_array($file_type, $allowed_types)) {
              echo "Error: Only JPG, PNG, JPEG and GIF file types are allowed.";
            } else {
              // Handle file upload
              $image = addslashes(file_get_contents($file_tmp));
                
              // Insert data into database
              $sql = "INSERT INTO advertisements (name, category, description, county, start_date, end_date, cost, email, image, user_id) VALUES ('$name', '$category', '$description', '$county', '$start_date', '$end_date', '$cost', '$email', '$image', '$users_id')";
              
              if (mysqli_query($conn, $sql)) {
                // JS alert box to display success or error message
                $message = "Advertisement created successfully. Your advertisement will be reviewed by an Admin. You can view the status of your submission in your account.";
                $redirect_url = "http://localhost/webappv1/index.php";
              } else {
                $message = "Error uploading data: " . mysqli_error($conn);
              }
            }
          } elseif (isset($_POST["no-image"])) {
            // User has chosen to proceed without image
            $image = null;
            
            // Insert data into database
            $sql = "INSERT INTO advertisements (name, category, description, county, start_date, end_date, cost, email, image, user_id) VALUES ('$name', '$category', '$description', '$county', '$start_date', '$end_date', '$cost', '$email', '$image', '$users_id')";
            
            if (mysqli_query($conn, $sql)) {
              $message = "Advertisement created successfully. Your advertisement will be reviewed by an Admin. You can view the status of your submission in your account.";
              $redirect_url = "http://localhost/webappv1/index.php";
            } else {
              $message = "Error uploading data: " . mysqli_error($conn);
            }
          } else {
            // Image upload was required but no image was selected
            $message = "Error: No image selected. Please select an image or confirm you would like to proceed without an image.";
          }
          
          // Close MySQL connection
          mysqli_close($conn);
          
          // Redirect the user to the index page once the alert message is displayed.
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