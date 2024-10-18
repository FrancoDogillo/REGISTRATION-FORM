<!-- Purpose: This file contains the functions that interact with the database. -->

<?php

require_once 'dbConfig.php';

// Insert records into the database
function insertRecords($pdo, $last_name, $first_name, $age, $talent, $future_career, $year_of_experience, $date_created) {
    $sql = "INSERT INTO career_registration (last_name, first_name, age, talent, future_career, year_of_experience, date_created) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([$last_name, $first_name, $age, $talent, $future_career, $year_of_experience, $date_created]);
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Displays error message
        return false;
    }
}
// Show all students table 
function showStudentRecords($pdo) {
  $sql = "SELECT * FROM career_registration";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    $results = $stmt->fetchAll();
    return $results;
  } else {
    return false;
  }
}

// Getting student id
function getStudentId($pdo, $id) {
  $sql = "SELECT * FROM career_registration WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([$id])) {
    return $stmt->fetch();
}
}

// Update student records
function updateStudentRecords($pdo, $last_name, $first_name, $age, $talent, $future_career, $year_of_experience, $id) {
  $sql = "UPDATE career_registration SET last_name = ?, first_name = ?, age = ?, talent = ?, future_career = ?, year_of_experience = ? WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$last_name, $first_name, $age, $talent, $future_career, $year_of_experience, $id]);
}

// Delete student records
function deleteStudentRecords($pdo, $id) {
  $sql = "DELETE FROM career_registration WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
}
?>