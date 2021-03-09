<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "laborator";
$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT id, username, email, uploaded_on
FROM users";

$result = mysqli_query($conn, $sql);
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
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!-- script pour exécuter les boutton debut et fin de cours -->
    <SCRIPT language="Javascript">
        function debut_cours() {
            fr_validation.submit();
        }

        function fin_cours() {
            fin_validation.submit();
        }
    </SCRIPT>
    <style>
        #myInput {
            background-image: url('../img_icone/search.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- <a class="navbar-brand" href="index.html">Start Bootstrap</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button -->
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Settings.php">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout_teach.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="teacher_dash.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="graphe.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            graphe
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                        <a class="nav-link" href="absence.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Status
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">@Nom:</div>
                    Kouassi koffi christ zougrou
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard teacher</li>
                    </ol>
                </div>

                <!-- Pour debuter et finir le cours -->
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <form action="teacher_dash.php" method="post" name="fr_validation">
                        <input type="submit" name="submit" class="btn btn-success" value="Debut des Cours" onclick="debut_cours();">
                    </form>

                    <form action="teacher_dash.php" method="post" name="fin_validation">
                        <input type="submit" name="fin_submit" value="fin cours" class="btn btn-danger" onclick="fin_cours();">
                    </form>
                </div>

                <?php
                if (isset($_POST["submit"])) {
                    //  Debut de cours
                    $date = date("Y-m-d");
                    $verif = mysqli_query($conn, "SELECT attendance_date FROM attendance WHERE  attendance_date = '$date'");
                    if (mysqli_num_rows($verif) == 0) {
                        // $insertion = "INSERT INTO attendance ( student_id, attendance_statut) VALUES ('67', 'abscent'), ( '69', 'abscent'), ('70', 'abscent'), ( '71', 'abscent'), ( '73', 'abscent'), ( '74', 'abscent'), ( '91', 'abscent')";
                        $insertion = "INSERT INTO attendance ( student_id, attendance_statut) select distinct id, 'abscent' from users ";
                        mysqli_query($conn, $insertion);
                        echo "debut des cours";
                    } else {
                        echo "Les cours ont déjà débuté";
                    }
                }

                if (isset($_POST["fin_submit"])) {
                    //  fin de cours
                    $date = date("Y-m-d");
                    $verif = mysqli_query($conn, "SELECT attendance_date FROM attendance WHERE  attendance_date = '$date'");
                    if (mysqli_num_rows($verif) != 0) {
                        // $insertion = "INSERT INTO attendance ( student_id, attendance_statut) VALUES ('67', 'abscent'), ( '69', 'abscent'), ('70', 'abscent'), ( '71', 'abscent'), ( '73', 'abscent'), ( '74', 'abscent'), ( '91', 'abscent')";
                        $update = "UPDATE attendance SET course_status = 1 WHERE attendance_date = '$date' ";
                        mysqli_query($conn, $update);
                        echo "Fin de cours";
                    } else {
                        echo "fin de cours echec";
                    }
                }
                ?>
                <!-- include la liste de presence -->
                <div class="container">

                    <div class="demo-content">
                        <h2 class="title_with_link">Liste des Etudiants</h2>
                        <!-- code pour la barre de recherche -->
                        <form name="frmSearch" method="post" action="">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                            <?php if (!empty($result)) { ?>
                                <table class="table" id="myTable">
                                    <thead>
                                        <!-- class="thead-dark" -->
                                        <tr>

                                            <th scope="col"><span>Name</span></th>
                                            <th scope="col"><span>Email</span></th>
                                            <th scope="col"><span>datetime</span></th>
                                            <th scope="col"><span>info</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["uploaded_on"]; ?></td>
                                                <td> <a href="view.php?id=<?php echo $row["id"]; ?>"> <img src="../img_icone/view.png" alt=""> </a> </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    <tbody>
                                </table>
                            <?php } ?>
                        </form>
                    </div>
                    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                    <!-- script pour rechercher nom -->
                    <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                    <br>
                </div>

                <?php
                //ajout mintenant 
                $compt = "SELECT users.username, count(attendance.attendance_date) AS nombre 
                FROM users, attendance WHERE users.id = attendance.student_id AND attendance_statut = 'abscent' GROUP BY username";
                $result = mysqli_query($conn, $compt);
                // include "dash_teacher.php"
                ?>
                <div class="container">
                    <div class="demo-content">
                        <h2 class="title_with_link"><b>Nombres D'Absences Par Etudiant</b></h2>

                        <?php if (!empty($result)) { ?>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"><span>name</span></th>
                                        <th scope="col"><span>nombre</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $row["username"]; ?></td>
                                            <td scope="row"><?php echo $row["nombre"]; ?></td>
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
                <?php
                // include "../graphe.php"
                ?>

            </main>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>