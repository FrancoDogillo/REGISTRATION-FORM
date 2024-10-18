<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="title">
    <h1>STUDENT MANAGEMENT SYSTEM</h1>
  </div>

  <?php $getStudentId = getStudentId($pdo, $_GET['id']); ?>
  <div class="form">
    <form action="core/handleForms.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $getStudentId['id']; ?>">
      <p>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo $getStudentId['last_name']; ?>" required>
      </p>
      <p>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?php echo $getStudentId['first_name']; ?>" required>
      </p>
      <p>
        <label for="age">Age</label>
        <input type="text" name="age" value="<?php echo $getStudentId['age']; ?>" required>
      </p>
      <p>
        <label for="talent">talent</label>
        <input type="text" name="talent" value="<?php echo $getStudentId['talent']; ?>" required>
      </p>
      <p>
        <label for="future_career">Dream Job</label>
        <input type="text" name="future_career" value="<?php echo $getStudentId['future_career']; ?>" required>
      </p>
      <p>
        <label for="year_of_experience">Dream Salary</label>
        <input type="text" name="year_of_experience" value="<?php echo $getStudentId['year_of_experience']; ?>" required>
      </p>
      <div style="text-align: center; margin-top: 50px;">
        <input type="submit" name="editBtn" value="Edit">
      </p>
    </form>
  </div>
</body>
</html>