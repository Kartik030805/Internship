<?php
require_once "Navbar/nav.php";
require_once "Database/Connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tid = $_POST['tid'];
    $tname = $_POST['tname'];
    $tdesc = $_POST['tdesc'];
    $tsdate = $_POST['tsdate'];
    $tedate = $_POST['tedate'];

    $sql = "SELECT * FROM `taskInfo` WHERE t_id = '$tid'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        echo "
        <html>
            <body>
                 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     <strong>Warning </strong> Your task id is already exist.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </body>
        </html>";
    } else {
        $id = "INSERT INTO `taskInfo` VALUES ('$tid','$tname','$tdesc','$tsdate','$tedate');";
        $idit = mysqli_query($con, $id);

        echo "
        <html>
            <body>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Successfull</strong> Your task added successfully.
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Add</title>
    <link rel="stylesheet" href="CSSs/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="head t-a-center">
            <h1>Schedule</h1>
        </div>
        <div class="notice t-a-center">
            <p>Create your Schedule</p>
        </div>
        <div class="taskForm">
            <section class="container">
                <form class="row g-3" action="./2_Form.php" method="post">
                    <div class="col-md-6">
                        <label for="tid" class="form-label">Task Id</label>
                        <input type="number" min="0" max="1000" class="form-control" name="tid" required placeholder="Enter task id">
                    </div>
                    <div class="col-md-6">
                        <label for="tname" class="form-label">Task title</label>
                        <input type="text" class="form-control" name="tname" required placeholder="Enter task title">
                    </div>
                    <div class="col-12">
                        <label for="tdesc" class="form-label">Task Discription</label>
                        <input type="text" class="form-control" name="tdesc" required placeholder="Enter task discription...">
                    </div>
                    <div class="col-md-6">
                        <label for="tsdate" class="form-label">Task Start-Date</label>
                        <input type="datetime-local" class="form-control" name="tsdate" required placeholder="Enter start-date">
                    </div>
                    <div class="col-md-6">
                        <label for="tedate" class="form-label">Task End-Date</label>
                        <input type="datetime-local" class="form-control" name="tedate" required placeholder="Enter end-date">
                    </div>
                    <div class="t-a-center">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-primary" type="reset" value="Reset">
                    </div>
                </form>
            </section>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>