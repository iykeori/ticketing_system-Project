<!DOCTYPE html>
<html>
    <head>
        <title>Track Request | NSCC Ticketing System</title>
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
            <h2 class="text-center">Track Request</h2>
            <p class="text-center">Enter Job ID find task</p>
            <div class="row justify-content-center align-items-center">
                <form method="POST" action="">
                    <div class="form-group">
                        <div>Job ID: <input type="text" name="jobID" class="form-control"/></div><br/>
                        <div class="row justify-content-center align-items-center">
                            <input class="btn btn-primary btn-md buttonColor" type="submit" name="finish" value="Finish"/><br/><br/>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="rounded-border-left">ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Department</th>
                        <th>Problem Type</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th class="rounded-border-right">Solved Request</th>                        
                        <th>Completion Comments</th>
                    </tr>
                </thead>
                <?php
                    include("db.php");
                    error_reporting(0);
                    ini_set('display_errors', 0);

                    if (isset($_POST["finish"]) && isset($_POST["jobID"]))
                    {
                        if (is_numeric($_POST["jobID"])) {

                            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
                            if (!$conn) {
                                die('Connection failed!');
                            }

                            $sql = "SELECT * FROM reports WHERE id = ".$_POST["jobID"];
                            $results = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($results)) { ?>
                                <!-- echo "ID: ".$row['id']."<br/>";
                                echo "Name: ".$row['name']."<br/>";
                                echo "Location: ".$row['location']."<br/>";
                                echo "Department: ".$row['department']."<br/>";
                                echo "Problem Type: ".$row['problem_type']."<br/>";
                                echo "Description: ".$row['description']."<br/>";
                                echo "Priority: ".$row['priority']."<br/>";
                                echo "Solved: ".$row['solved']."<br/>"; -->

                                <tr>
                                <td><?php echo $row['id']; ?></td>            
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td><?php echo $row['problem_type']; ?></td>
                                <td style="width: 100px;"><?php echo $row['description']; ?></td>
                                <td><?php echo $row['priority']; ?></td>
                                <td><?php echo $row['solved']; ?></td>
                                <td><?php echo $row['comments']; ?></td>
                                                                            
                            </tr>
                            <?php }

                        }
                    } 
                ?>
            </table>
            <script>
            $(document).ready(function() {
                    $('#dataTable').DataTable();
            });
            </script>
        </div>
    </body>
    
    <footer class="footer">
        <div class="container">
            <span><i>Copyright Team A1</i></span>
        </div>
    </footer>
</html>