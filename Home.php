<!DOCTYPE html>
<html>
    <head>
        <title>Ticketing System | NSCC Marconi</title>
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
        
        <!-- Main div -->
        <div class="container-fluid home-div">
            <div class="jumbotron">
                <h2 class="text-center">Welcome to NSCC Marconi's Ticketing System!</h2>
                <p class="text-center">Please choose <i>User</i> to fill out a ticket</p>
                <hr class="my-4">
                      
                <div class="row">
                    <div class="col-md-6 text-center textVCenter">
                        <!-- User button -->
                        <a href="./RequestForm.php" class="btn btn-primary btn-lg buttonColor" role="button" aria-disabled="true">USER</a>
                    </div>
                    <div class="col-md-6 text-center textVCenter">
                        <!-- Admin button -->       
                        <a href="./AdminLogin.php" class="btn btn-primary btn-lg buttonColor" role="button" aria-disabled="true">ADMIN</a>
                    </div>
                </div>
            </div>
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