<?php
    include_once("db.php");

    error_reporting(0);
    ini_set('display_errors', 0);
    //initalize 
    $username = "";
    $password = "";

    //check if form is submitted
    if (isset($_POST["adminForm"])) {
        //if it has, retrieve each field
        $username = $_POST['username'];
        $password = $_POST["password"];
    }

    //check for errors
    $errors = false;
    $error_code = 0;

    if ($username == null || empty($username)) {
        $errors = true;
        $error_code = 1;
    } else if ($password == null || empty($password)) {
        $errors = true;
        $error_code = 2;
    }

    //if there are errors redisplay the form
    if (!isset($_POST["adminForm"]) || $errors) { 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login | NSCC Ticketing System</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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

	    <div id="form-containers">
            <h2>Login</h2>
            <p>Please fill out both fields</p>
            <form id="adminForm" name="adminForm" method="POST" action="AdminLogin.php">
                <!-- Name div -->
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required />
                    <?php if (isset($_POST["adminForm"]) && empty($username)) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?>            
                </div>
                <!-- Location div -->
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>"required /> 
                    <?php if (isset($_POST["adminForm"]) && empty($password)) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?><br />  
                </div>
                <!-- Submit button -->
                <input type="submit" class="btn btn-primary buttonColor" name="adminForm" value="Submit">
                <br/>
		    </form>
        </div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    </body>   
    
    <footer class="footer">
        <div class="container">
            <span><i>Copyright Team A1</i></span>
        </div>
    </footer>
</html>

<?php
    } else {
        $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
        if (!$conn) {
            die('Connection failed!');
        } 

        $sql = "SELECT * FROM admin_credentials";
        $results = mysqli_query($conn, $sql);

        //loop through entries
        while ($row = mysqli_fetch_assoc($results)) {
            //if username && password match with a db entry
            if (($row['username'] == $username) && ($row['password'] == $password)) {
                header("Location:MainSelection.php");
                die();
            } else {
                header("Location:AdminLogin.php"); ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <p>Please, enter correct username and password.</p>
                </div>
             <?php   die();
            }
        }
    }
    mysqli_close($conn);
?>