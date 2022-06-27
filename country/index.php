<?php

include("model.php");

$csv = new Country();

if (isset($_POST['upload'])) {
    $csv->import($_FILES['file']['tmp_name']);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Countries</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upload CSV file</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="file" name="file" id="" required>
                                <button type="submit" name="upload" class="btn btn-primary">Upload File</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Countries List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Continent code</th>
                                        <th>Currency code</th>
                                        <th>ISO2 code</th>
                                        <th>ISO3 code</th>
                                        <th>ISO numeric code</th>
                                        <th>Fips code</th>
                                        <th>Calling code</th>
                                        <th>Common name</th>
                                        <th>Official name</th>
                                        <th>Endonym</th>
                                        <th>Demonym</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
include('config.php');
$query = mysqli_query($con, "SELECT * FROM `country`") or die(mysqli_error($conn));
$count = 1;
while ($row = mysqli_fetch_array($query)) {
?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $row['continent_code']; ?></td>
                                        <td><?php echo $row['currency_code']; ?></td>
                                        <td><?php echo $row['iso2_code']; ?></td>
                                        <td><?php echo $row['iso3_code']; ?></td>
                                        <td><?php echo $row['iso_numeric_code']; ?></td>
                                        <td><?php echo $row['fips_code']; ?></td>
                                        <td><?php echo $row['calling_code']; ?></td>
                                        <td><?php echo $row['common_name']; ?></td>
                                        <td><?php echo $row['official_name']; ?></td>
                                        <td><?php echo $row['endonym']; ?></td>
                                        <td><?php echo $row['demonym']; ?></td>
                                    </tr>
                                    <?php
}
;
?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>



        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script>
        $(function() {
            $("#example1").DataTable({
                "lengthChange": true,
                "autoWidth": true,
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
            });
        });
        </script>
    </body>

</html>