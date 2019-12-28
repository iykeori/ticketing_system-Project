<!DOCTYPE html>
<html>
    <head>
        <title>Solved Job Report | NSCC Ticketing System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--   <link rel="stylesheet" type="text/css" href="style.css"> -->
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Page level plugin JavaScript-->
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <style>
            * {
                font-family: 'Museo Slab', sans-serif;
            }
            .container {
                margin-top: 30px;
            }
            form {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>

        <div class="container"> 
            <h3><strong>Solved Jobs Report</strong></h3>
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Department</th>
                        <th>Problem Type</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Completion Comments</th>
                    </tr>
                    </tr>
                </thead>
                <?php
                    include("db.php");

                    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
                    if (!$conn) {
                        die('Connection failed!');
                    }

                    $sql = "SELECT * FROM reports WHERE solved = 1";
                    $results = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($results)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>            
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['problem_type']; ?></td>
                            
                            <td style="width: 100px;"><?php echo $row['description']; ?></td>
                            <td><?php echo $row['priority']; ?></td>
                            <td><?php echo $row['comments']; ?></td>
                                            
                        </tr>
                    <?php }?>    
            </table>

            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
        </div>
    </body>
</html>