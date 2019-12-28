<!DOCTYPE html>
<html>
    <head>
        <title>Solve Job | NSCC Ticketing System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="TicketingSystem.css" rel="stylesheet"></link>
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

        <br/>
        <h2 class="text-center">Solve Job</h2>
        <p class="text-center">Enter Job ID to finish task</p>
        <div class="center-text">
            <form method="POST" action="">
                <div><input type="text" placeholder="Job ID" name="jobID"/></div><br/>
                <div><textarea placeholder="Finishing comments." name="comments"></textarea><div><br/>
                <input class="btn btn-primary btn-md buttonColor" type="submit" name="finish" value="Finish"/><br/><br/>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
    <footer class="footer">
        <div class="container">
            <span><i>Copyright Team A1</i></span>
        </div>
    </footer>
</html>


<?php
    include("db.php");

    if (isset($_POST["finish"]) && isset($_POST["jobID"]))
    {
        if (is_numeric($_POST["jobID"])) {

            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
            if (!$conn) {
                die('Connection failed!');
            }

            $sql = "SELECT * FROM reports WHERE id = ".$_POST["jobID"];
            $results = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                if ($row['solved']) {
                    echo "This report has already been completed.";
                } else {
                    $sql = 'UPDATE reports SET solved = 1 WHERE id = '.$_POST["jobID"];
                    mysqli_query($conn, $sql);
                    $sql = 'UPDATE reports SET comments = "'.$_POST['comments'].'" WHERE id = '.$_POST["jobID"];
                    mysqli_query($conn, $sql);
                    echo "Request completed.";
                }
            }

        }
    } 
?>