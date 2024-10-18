<!-- Purpose: Handle form data from index.php and insert into database -->

<?php

require_once 'dbConfig.php';
require_once 'models.php';

// When the submit button is clicked on the form in index.php, the form data is sent to the server
if (isset($_POST['submitBtn'])) {
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $age = $_POST['age'];
  $talent = $_POST['talent'];
  $future_career = $_POST['future_career'];
  $year_of_experience = $_POST['year_of_experience'];
  $date_created = date('Y-m-d H:i:s');

  if (!empty($last_name) && !empty($first_name) && !empty($age) && !empty($talent) && !empty($future_career) && !empty($year_of_experience)) {
    $query = insertRecords($pdo, $first_name, $last_name, $age, $talent, $future_career, $year_of_experience, $date_created);
}
    if ($query) {
      header("Location: ../index.php");
    }

    else {
      echo "Insertion failed";
    }
  }

  else {
    echo "Make sure that no fields are empty";
  }
  


if (isset($_POST['editBtn'])) {
  $id = $_POST['id'];
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $age = $_POST['age'];
  $talent = $_POST['talent'];
  $future_career = $_POST['future_career'];
  $year_of_experience = $_POST['year_of_experience'];
  updateStudentRecords($pdo, $last_name, $first_name, $age, $talent, $future_career, $year_of_experience, $id);
  if (!empty($last_name) && !empty($first_name) && !empty($age) && !empty($talent) && !empty($future_career) && !empty($year_of_experience)) {
    echo "Record updated successfully! <br>";
    echo '<a href="../index.php">Go back to index</a>';
  } else {
    echo "Failed to update record!";
    echo '<a href="../index.php">Go back to index</a>';
  }
}

if (isset($_POST['deleteBtn'])) {
  $id = $_POST['id'];
  deleteStudentRecords($pdo, $id);
  if (!empty($id)) {
    echo "Record deleted successfully! <br>";
      echo '<a href="../index.php">Go back to index</a>';
  } else {
    echo "Failed to delete record!";
    echo '<a href="../index.php">Go back to index</a>';
  }
}



?>