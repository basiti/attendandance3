<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'laborator';

$user_id = $_SESSION["user_id"];
$conn = mysqli_connect($host, $user, $pass, $db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="teacher/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    $email = $_SESSION["email"];
    $sql = mysqli_query($conn, "select id, username, phone, email, sex, file_name, uploaded_on from users where email='$email'");
    $row = mysqli_fetch_assoc($sql);
    $id = $row["id"];
    $username = $row["username"];
    $phone = $row["phone"];
    $email = $row["email"];
    $sex = $row["sex"];
    $file_name = $row["file_name"];

    // $uploaded = $row["uploaded"];

    ?>


    <!-- signature -->
    <?php
    $sql = "SELECT attendance_date, attendance_statut, why 
            FROM attendance WHERE student_id = $user_id AND attendance_statut = 'abscent'";

    $result = mysqli_query($conn, $sql);
    ?>

    <div class="container">
        <div class="demo-content">
            <h2 class="title_with_link"><b>Status de l'Etudiant</b></h2>

            <?php if (!empty($result)) { ?>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><span>Date</span></th>
                            <th scope="col"><span>status</span></th>
                            <th scope="col"><span>why</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $row["attendance_date"]; ?></td>
                                <td scope="row"><?php echo $row["attendance_statut"]; ?></td>
                                <td scope="row"><?php echo $row["why"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    <tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <a href="students_dashboard.php">Retour</a>
    <!-- fin signature -->

    <!-- fin inclu -->

    </main>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>