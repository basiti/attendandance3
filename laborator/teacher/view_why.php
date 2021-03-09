<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'laborator';
$user_id = $_SESSION["user_id"];
$conn = mysqli_connect($host, $user, $pass, $db);

if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE attendance SET id = '" . $_POST['id'] . "', why = '" . $_POST['why'] . "' WHERE id ='" . $_POST['id'] . "'");

    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT users.username, attendance.id, attendance.attendance_date, attendance.attendance_statut, attendance.why 
    FROM attendance, users 
    WHERE attendance.id='" . $_GET['id'] . "'");

$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Justification</title>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

<body>
    <form name="frmUser" method="post" action="">
        <div><?php if (isset($message)) {
             ?><span class="text-danger"><?php echo $message ?> </span><?php
                    // echo  $message;
                } ?>
        </div>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">Justifiction</div>
                <div class="col-md-3" align="right">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <label class="col-md-4 text-right">statut </label>
                    <div class="col-md-8">
                        <input type="text" name="statut" class="form-control" value="<?php echo $row['attendance_statut']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-md-4 text-right">why</label>
                    <div class="col-md-8">
                        <input type="text" name="why" class="form-control" value="<?php echo $row['why']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer" align="center">
            <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm">
        </div>
    </form>
</body>

</html>