<?php
// session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'laborator';
// $user_id = $_SESSION["user_id"];
$conn = mysqli_connect($host, $user, $pass, $db);

$req = "SELECT users.username, count(attendance.attendance_date) AS nombre
FROM users, attendance WHERE users.id = attendance.student_id AND attendance_statut = 'abscent' GROUP BY username";

if ($result = $conn->query($req)) {
    $graph = array();
    while ($row = $result->fetch_row()) {
        array_push($graph, array("y" => $row[1], "label" => $row[0]));
    }
}
$dataPoints = $graph;


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Nombre D'Absence Par Etudiant"
                },
                axisY: {
                    title: "absence"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## absence(s)",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>


</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <br>
    <br>

    <!-- <a href="teacher/teacher_dash.php">Retour</a> -->
    <!-- signature -->


</body>

</html>