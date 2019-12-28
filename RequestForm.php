<?php
    include_once("db.php");

    //initalize 
    $name = "";
    $location = "";
    $department = "";
    $problem = "";
    $description = "";

    //check if form is submitted
    if (isset($_POST["requestForm"])) {
        
        //if it has, retrieve each field
        $name = $_POST['name'];
        $location = $_POST["location"];
        $department = $_POST["department"];
        $problem = $_POST["problem"];
        $description = $_POST["description"];

        //check for errors
        $errors = false;
        $error_code = 0;

        if ($name == null || empty($name)) {
            $errors = true;
            $error_code = 1;
        } else if ($location == null || empty($location)) {
            $errors = true;
            $error_code = 2;
        } else if ($department == null || empty($department)) {
            $errors = true;
            $error_code = 3;
        } else if ($problem == null || empty($problem)) {
            $errors = true;
            $error_code = 4;
        } else if ($description == null || empty($description)) {
            $errors = true;
            $error_code = 5;
        }

    }

    //if there are errors redisplay the form
    if (!isset($_POST["requestForm"]) || $errors) { 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Request Form | NSCC Ticketing System</title>
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
            <h2>Request Form</h2>
            <p>Please fill out all fields</p>
            <form id="requestForm" name="requestForm" method="POST" action="RequestForm.php">
                <!-- Name div -->
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required />   
                    <?php if (isset($_POST["requestForm"]) && empty($name)) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?>        
                </div>
                <!-- Location div -->
                <div class="form-group">
                    <label>Location:</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $location; ?>" required />   
                    <?php if (isset($_POST["requestForm"]) && empty($location)) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?>
                    <small>(Example: B307)</small>         
                </div>
                <!-- Department div -->
                <div class="form-group">                
                    <label>Department:</label>
                    <select class="form-control" name="department" required>
                        <option value="" selected>Choose an option</option>
                        <option value="Access, Education, and Language" 
                        <?php if ($department != null && $department=="Access, Education, and Language") echo "selected"; ?>
                        >Access, Education, and Language</option>
                        <option value="Business and Creative" 
                        <?php if ($department != null && $department=="Business and Creative") echo "selected"; ?>
                        >Business and Creative</option>
                        <option value="Health and Human Services" 
                        <?php if ($department != null && $department=="Health and Human Services") echo "selected"; ?>
                        >Health and Human Services</option>
                        <option value="Technology and Environment" 
                        <?php if ($department != null && $department=="Technology and Environment") echo "selected"; ?>
                        >Technology and Environment</option>
                        <option value="Trades and Transportation" 
                        <?php if ($department != null && $department=="Trades and Transportation") echo "selected"; ?>
                        >Trades and Transportation</option>
                    </select>
                    <?php if (isset($_POST["requestForm"]) && ($department == null || empty($department))) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?>
                </div>
                <!-- Problem Type div -->
                <div class="form-group">
                    <label>Problem Type:</label>
                    <select class="form-control" name="problem" required>
                        <option value="" selected>Choose an option</option>
                        <option value="Hardware" <?php if ($problem != null && $problem=="Hardware") echo "selected"; ?>
                        >Hardware</option>
                        <option value="Software" <?php if ($problem != null && $problem=="Software") echo "selected"; ?>
                        >Software</option>
                        <option value="Hardware and Software" <?php if ($problem != null && $problem=="Hardware and Software") echo "selected"; ?>
                        >Hardware and Software</option>
                        <option value="Network" <?php if ($problem != null && $problem=="Network") echo "selected"; ?>
                        >Network</option>
                        <option value="Other" <?php if ($problem != null && $problem=="Other") echo "selected"; ?>
                        >Other</option>
                    </select>
                    <?php if (isset($_POST["requestForm"]) && ($problem == null || empty($problem))) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?>
                </div>              
                <!-- Description div -->
                <div class="form-group">
                    <label for="lastName">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Describe the issue here" required><?php echo $description; ?></textarea>
                    <?php if (isset($_POST["requestForm"]) && empty($description)) echo "<font color='red'><strong>REQUIRED</strong></font>"; ?> 
                </div>
                <!-- Submit button -->
                <input type="submit" class="btn btn-primary buttonColor" name="requestForm" value="Submit">
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

        $sql = "INSERT INTO reports (name, location, department, problem_type, description) 
                VALUES ('$name', '$location', '$department', '$problem', '$description')";
        mysqli_query($conn,$sql);
    }

    if ($conn) {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Request Form | NSCC Ticketing System</title>
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
        
        <!-- Main div -->
        <div class="container-fluid home-div">
            <div class="jumbotron">
                <h2 class="text-center">Thank you for filling out a ticket with NSCC Marconi Campus!</h2>
                <p class="text-center">We will get back to you shortly</p>
                <hr class="my-4">
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

<?php
    }
?>