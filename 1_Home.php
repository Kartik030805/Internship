<?php
require_once "Navbar/nav.php";
require_once "Database/Connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tid = $_POST['dtid'];

  $sql = "SELECT * FROM `taskInfo` WHERE t_id = '$tid'";
  $result = mysqli_query($con, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {

    $sql = "DELETE FROM `taskinfo` WHERE `t_id` = '$tid';";
    $result = mysqli_query($con, $sql);

    echo "
      <html>
          <body>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Success </strong> Your task deleted successfully.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
          </body>
      </html>";
  } else {
    echo "
      <html>
          <body>
               <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                   <strong>Warning </strong> Your task id is doesn't exist.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
          </body>
      </html>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Schedule Home</title>
  <link rel="stylesheet" href="CSSs/home.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="main">
    <div class="head">
      <h1>Schedule Tasks</h1>
    </div>
    <div class="data_table">
      <?php

      require "Database/Connection.php";
      $rft = "SELECT  * FROM `taskInfo`";
      $rd = mysqli_query($con, $rft);
      $r = mysqli_num_rows($rd);

      if ($r > 0) {
        echo "<table class='table'>
        <thead>
          <tr>
            <th>Task Id</th>
            <th>Task Title</th>
            <th>Task Discription</th>
            <th>Task Start-date</th>
            <th>Task End-date</th>
          </tr>
        </thead>";
        while ($raw = mysqli_fetch_array($rd)) {
          echo "<tbody>";
          echo "<tr>";
          echo "<td>" . $raw['t_id'] . "</td>";
          echo "<td>" . $raw['task_title'] . "</td>";
          echo "<td>" . $raw['task_desc'] . "</td>";
          echo "<td>" . $raw['tsdate'] . "</td>";
          echo "<td>" . $raw['tedate'] . "</td>";
          echo "</tr>";
          echo "</tbody>";
        }
        echo "</table>";
      } else {
        echo "
        <div class='empty'>
          <p>Tasks are empty..!</p>
        </div>
        ";
      }


      ?>
    </div>
    <div class="Buttons">
      <a href="2_Form.php"><button type="button" class="btn btn-primary">Add Task</button></a>
      <a href="3_Update.php"><button type="button" class="btn btn-primary">Update Task</button></a>
      <form action="./1_Home.php" method="get" class="dform"><input class="btn btn-primary" type="submit" value="Delete Task"></form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      echo "
      <div class='delete'>
      <div class='head t-a-center'>
        <h1>Schedule Delete</h1>
      </div>
      <section class='container'>
        <form class='mform' action='./1_Home.php' method='post'>
          <div class='mg-auto'>
            <label for='dtid' class='form-label'>Task Id</label>
            <div class='input-group mb-3'>
              <input type='number' min='0' max='1000' name='dtid' class='form-control' placeholder='Enter your id for delete'>
              <input class='btn btn-primary' type='submit' value='Submit'>
            </div>
          </div>
        </form>
      </section>
    </div>
        ";
    }
    ?>


  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>