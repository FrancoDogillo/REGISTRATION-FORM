<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="title">
    <h1>REGISTRAION SYSTEM</h1>
  </div>

  <div class="form">
    <form action="core/handleForms.php" method="POST">
      <!-- using required to make sure it don't leave null answer -->
      <p>
        <label for="last_name">Last Name:</label> 
        <input type="text" name="last_name" required> 
      </p>
      <p>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required> 
      </p>
      <p>
        <label for="age">Age:</label>
        <input type="text" name="age" required> 
      </p>
      <p>
        <label for="talent">Talent:</label>
        <input type="text" name="talent" required> 
      </p>
      <p>
        <label for="future_career">Future Career:</label>
        <input type="text" name="future_career" required> 
      </p>
      <p>
        <label for="year_of_experience">Year of Experience:</label>
        <input type="text" name="year_of_experience" required> 
      </p>
      <p>
        <label for="date_created">Date Created:</label>
        <input type="date" name="date_created" required> 
      </p>
      <p style="display: flex; justify-content: center;">
    <input type="submit" name="submitBtn" value="Submit">
</p>
    </form>
  </div>
  
  <div class="testGlobal" style="text-align: center; margin-top: 50px;">
    <a href="testGetVariable.php?studentLastName=Dogillo&studentAge=22">Test Get SuperGlobal</a>
  </div>

  <div class="table" style="padding: 50px;">
  <?php $showStudentRecords = showStudentRecords($pdo);?>
  <?php if ($showStudentRecords) : ?>
    <table border="1" style="margin: 0 auto; text-align: center; width: 50%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Age</th>
          <th>talent</th>
          <th>future career</th>
          <th>Year of Experience</th>
          <th>Date Created</th>
          <th>Modify</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($showStudentRecords as $student) : ?>
          <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['last_name']; ?></td>
            <td><?php echo $student['first_name']; ?></td>
            <td><?php echo $student['age']; ?></td>
            <td><?php echo $student['talent']; ?></td>
            <td><?php echo $student['future_career']; ?></td>
            <td><?php echo $student['year_of_experience']; ?></td>
            <td><?php echo $student['date_created']; ?></td>
            <td>
              <a href="editstudent.php?id=<?php echo $student['id']; ?>">Edit</a>
              <a href="deletestudent.php?id=<?php echo $student['id']; ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <p style="text-align: center;">No records found!</p>
  <?php endif; ?>
  </div>
</body>
</html>