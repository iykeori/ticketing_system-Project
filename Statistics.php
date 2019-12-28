<?php
    //require('fpdf181/fpdf.php');

    //$pdf = new FPDF("L","mm","A4");
    // $pdf->AddPage();
    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(40,10,'Hello World!');
    // $pdf->Output();
    ?>
<!DOCTYPE html>
   
<html>
    <head>
        <title>Statistics Report | NSCC Ticketing System</title>
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
        <h3><strong>Statistical Summary</strong></h3>
        Total Requests Recieved:
        <?php
            include("db.php");

            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);
            if (!$conn) {
                die('Connection failed!');
            }

            //Requests recieved
            $recieved = 0;
            $sql = "SELECT * FROM reports";
            $results = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                $recieved++;
            }
            echo $recieved;

            echo "<br/>";

            echo "Total Requests Completed: ";
            $solved = 0;
            //Requests completed
            $sql = "SELECT * FROM reports WHERE solved = 1";
            $results = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                $solved++;
            }
            echo $solved."<br/>";
            echo "Total Requests Outstanding: ".($recieved-$solved);
        ?>
        <br/>
        <br/>
            
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>
                    Department
                </th>
                <th>
                    Access Education, and Language
                </th>
                <th>
                    Business and Creative
                </th>
                <th>
                    Health and Human Services
                </th>
                <th>
                    Technology and Enviroment
                </th>
                <th>
                    Trades and Transportation
                </th>
            </tr>
            <tr>
                <th>
                    Requests Recieved
                </th>
                <th>
                    <?php
                        $AELrecieved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Access, Education, and Language'";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $AELrecieved++;
                        }
                        echo $AELrecieved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $BCrecieved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Business and Creative'";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $BCrecieved++;
                        }
                        echo $BCrecieved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $HHSrecieved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Health and Human Services'";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $HHSrecieved++;
                        }
                        echo $HHSrecieved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $TErecieved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Technology and Enviroment'";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $TErecieved++;
                        }
                        echo $TErecieved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $TTrecieved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Trades and Transportation'";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $TTrecieved++;
                        }
                        echo $TTrecieved."<br/>";
                    ?>
                </th>
            </tr>
            <tr>
                <th>
                    Requests Completed
                </th>
                <th>
                    <?php
                        $AELsolved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Access, Education, and Language' AND solved=1";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $AELsolved++;
                        }
                        echo $AELsolved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $BCsolved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Business and Creative' AND solved=1";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $BCsolved++;
                        }
                        echo $BCsolved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $HHSsolved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Health and Human Services' AND solved=1";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $HHSsolved++;
                        }
                        echo $HHSsolved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $TEsolved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Technology and Enviroment' AND solved=1";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $TEsolved++;
                        }
                        echo $TEsolved."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        $TTsolved = 0;
                        $sql = "SELECT * FROM reports WHERE department='Trades and Transportation' AND solved=1";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $TTsolved++;
                        }
                        echo $TTsolved."<br/>";
                    ?>
                </th>
            </tr>
            <tr>
                <th>
                    Requests Outstanding
                </th>
                <th>
                    <?php
                        echo ($AELrecieved-$AELsolved)."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        echo ($BCrecieved-$BCsolved)."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        echo ($HHSrecieved-$HHSsolved)."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        echo ($TErecieved-$TEsolved)."<br/>";
                    ?>
                </th>
                <th>
                    <?php
                        echo ($TTrecieved-$TTsolved)."<br/>";
                    ?>
                </th>
            </tr>
        </table>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    </div>
    </body>
</html>