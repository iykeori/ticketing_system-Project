<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="TicketingSystem.css" rel="stylesheet"></link>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--   <link rel="stylesheet" type="text/css" href="style.css"> -->
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Page level plugin JavaScript-->
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <style>
            .container {
                margin-top: 30px;
            }
            form {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #104477;">
            <a class="navbar-brand white-text">NSCC Ticketing System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link white-text" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-text" href="RequestForm.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-text" href="AdminLogin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h2 class="text-center">Assign Priority</h2>
            <p class="text-center">1=Low | 2=Medium | 3=High</p>
            <form method="POST" action=''>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="rounded-border-left">ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Department</th>
                            <th>Problem Type</th>
                            <th>Description</th>
                            <th>Solved</th>
                            <th>Comments</th>
                            <th>Priority</th>
                            <th class="rounded-border-right"></th>
                        </tr>
                    </thead>
                        <?php
                            include("db.php");

                            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
                            if (!$conn) {
                                die('Connection failed!');
                            }
   
                            $buttonNum = 0;

                            $sql = "SELECT * FROM reports";
                            $results = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($results)) {

                                $buttonNum++;

                                echo "<tr>";
                                echo "<th>".$row['id']."</th>";
                                echo "<th>".$row['name']."</th>";
                                echo "<th>".$row['location']."</th>";
                                echo "<th>".$row['department']."</th>";
                                echo "<th>".$row['problem_type'],"</th>";
                                echo "<th>".$row['description']."</th>";
                                echo "<th>".$row['solved']."</th>";
                                echo "<th>".$row['comments']."</th>";
                                echo "<th><input type='text' name='priority".$buttonNum."' style='width:50%'/></th>";
                                echo "<th><input type='submit' name='assign".$buttonNum."' value='Submit' class='btn btn-primary btn-md buttonColor'/></th>";
                                echo "</tr>";
                            }
                        ?>
                </table>
            </form>

            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
            <br/>
            <br/>
        </div>    
    </body>
    
    <footer class="footer">
        <div class="container">
            <span><i>Copyright Team A1</i></span>
        </div>
    </footer>
</html>

<?php
    for ($i=0;$i<=$buttonNum;$i++) {
        if (isset($_POST["assign".$i]))
        {
            echo "2";

            if (is_numeric($_POST["priority".$i]) && ($_POST["priority".$i] < 4) && ($_POST["priority".$i] > 0)) {
                $sql = "SELECT priority FROM reports WHERE id = ".$i;
                $results = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($results)) {
                    $sql = 'UPDATE reports SET priority = '.$_POST["priority".$i].' WHERE id = '.$i;
                    mysqli_query($conn, $sql);
                }
            }

        } 
    }

?>