<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'laborator';
$id = "1";
$conn = mysqli_connect($host, $user, $pass, $db);
$sql = mysqli_query($conn, "select * from teacher where id=1");
$row = mysqli_fetch_assoc($sql);
// $id = $row["id"];
$email = $row["email"];
$pass = $row["password"];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Attendance profile</title>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag -------- -->
    <SCRIPT language="Javascript">
        function checkpass() {
            if (document.profile_form.password1.value != document.profile_form.password2.value) {
                window.alert("mots de passe non conforme");
            }
            //     else {
            //     //    function bien(){ok}
        }
    </SCRIPT>
</head>

<?php
$error_email = '';
$error_pass = '';
$error = 0;
$success = '';

if (isset($_POST["button_action"])) {
    $email_new = $_POST["email"];
    $pass1_new = $_POST["password"];
    $pass2_new = $_POST["password1"];
    $Newpass = $pass;

    if ($pass != $pass1_new || $email_new == "") {
        if ($email_new == "") {
            $error_email = 'le nom est requis';
        }

        if ($pass != $pass1_new) {
            $error_pass = 'mot de passe saisi est incorrect';
        }
    } else {
        if ($pass2_new != '') {
            $Newpass = $pass2_new;
        }
        $update = mysqli_query($conn, "UPDATE teacher SET email= '$email_new', password = '$Newpass' WHERE id='1'");

        if ($update) {
            $success = 'success';
            header('Location: Settings.php');
        } else {
            echo  'Echec modification, Veuillez reprendre.';
        }

        mysqli_close($conn);
    }
}




?>

<body>
    <br>
    <a href="teacher_dash.php">Retour</a>
    <div class="container" style="margin-top:30px">
        <span><?php echo $success; ?></span>
        <div class="card">
            <form method="post" name="profile_form" id="profile_form" enctype="multipart/form-data">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">Profile</div>
                        <div class="col-md-3" align="right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Email<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>" />
                                <span class="text-danger"> <?php echo $error_email ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Ancien password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $pass ?>" />
                                <span class="text-danger"> <?php echo $error_pass ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Nouveau password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password1" id="password1" class="form-control" placeholder="Leave blank to not change it" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Confirmez Nouveau password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Leave blank to not change it" onchange="checkpass();" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" align="center">

                    <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Save" />
                </div>
            </form>
        </div>
    </div>
    <br />
    <br />

</body>

</html>

<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css" />

<style>
    .datepicker {
        z-index: 1600 !important;
        /* has to be larger than 1050 */
    }
</style>