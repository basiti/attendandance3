<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "laborator";
$conn = mysqli_connect($servername, $username, $password, $db);

$sql = "SELECT id, username, email, uploaded_on
FROM users";

$result = mysqli_query($conn, $sql);
?>

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
                                <td> <a href="view.php?id=<?php echo $row["id"]; ?>">view</a> </td>
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
<!-- </body>

</html> -->