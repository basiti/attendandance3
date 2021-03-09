<?php
$date = date("Y-m-d");
$verif = mysqli_query($conn, "SELECT attendance_date FROM attendance WHERE  attendance_date='$date'");

if ($_POST['submit']) {
    $date = date("Y-m-d");
                $verif = mysqli_query($conn, "SELECT attendance_date FROM attendance WHERE  attendance_date='$date'");
                // var_dump($verif);
                // var_dump(mysqli_num_rows($verif)); 

                if (mysqli_num_rows($verif) == 0) {

                    $insertion = "INSERT INTO attendance ( student_id, attendance_status) VALUES ('67', 'abscent'), ( '69', 'abscent'), ('70', 'abscent'), ( '71', 'abscent'), ( '73', 'abscent'), ( '74', 'abscent'), ( '91', 'abscent')";
                    mysqli_query($conn, $insertion);
                    echo "debut des cours";
                } else {
                    echo "Les cours ont séjà débutés";
                }
}

?>









<!-- ajout
<form action="" method="POST">
    <button type="button" name="enrg" class="btn btn-success">Debut Des Cours</button>
</form> -->