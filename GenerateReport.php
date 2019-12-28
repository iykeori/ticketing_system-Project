<!DOCTYPE html>
<html>
    <head>
        <title>Generate Report | NSCC Ticketing System</title>
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
        <div class="center-text">

        <!--
            <select name="reportType">
                <option value="">Select a Report</options>
                <option value="JobStatusList">Job Status List</options>
                <option value="SolvedJobList">Solved Jobs List</options>
                <option value="Statistics">Statistics</options>
            </select>
            <br/>
            <input type="submit" value="Submit"/>

            -->
            <a href="JobStatusList.php"><input class="btn btn-primary btn-md buttonColor" type="submit" value="Job Status"/></a><br/><br/>
            <a href="SolvedJobList.php"><input class="btn btn-primary btn-md buttonColor" type="submit" value="Solved Jobs"/></a><br/><br/>
            <a href="Statistics.php"><input class="btn btn-primary btn-md buttonColor" type="submit" value="Statistics"/></a><br/><br/>
        </div>
    </body>
    
    <footer class="footer">
        <div class="container">
            <span><i>Copyright Team A1</i></span>
        </div>
    </footer>
</html>