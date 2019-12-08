<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';
//if (!isset($_SESSION['patientSession'])) {
//    header("Location: ../index.php");
//}
//$usersession = $_SESSION['patientSession'];
$firstname = $_SESSION['first_name1'];
$lastname = $_SESSION['last_name1'];
$patient_pps = $_SESSION['pps1'];
$patient_records_list = get_upcomingrecords_by_pps($patient_pps);

//$res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient=" . $usersession);
//if ($res === false) {
//    echo mysql_error();
//}
//$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Patient - Upcoming Appointments</title>

        <!-- Custom fonts for this template-->
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Datatable -->
        <style>
            .dataTables_filter {
                text-align: right !important;
            }       
            .dataTables_filter label{
                text-align: left !important;
            }
            #dataTable_paginate{
                float: right!important;
            }
        </style>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'patientSideBar.php'; ?>
            <!-- End Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include 'patientTopBar.php'; ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div id="home_1" class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800"></h1>





                    </div>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointments</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Doctor<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Hospital<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Date<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Time<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Status<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                                <th>Cancellation<span id="sort_icon"><i class="fas fa-sort"></i></span></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Doctor</th>
                                                <th>Hospital</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Cancellation</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($patient_records_list as $record_list) : ?>
                                                <tr>
                                                    <td><?php
                                                        echo $record_list['id'];
                                                        $pps = $record_list['pps_num'];
                                                        ?></td>
                                                    <td><a href="view_doctor.php?pps=<?php echo $pps; ?>"><?php echo $record_list['d_first_name']; ?> <?php echo $record_list['d_last_name']; ?></td>
                                                    <td><?php echo $record_list['name']; ?></td>
                                                    <td><?php
                                                        $timestamp = strtotime($record_list['time']);
                                                        echo date('d-m-Y', $timestamp);
                                                        ?></td>
                                                    <td><?php
                                                        echo date('h.ia', $timestamp);
                                                        ?></td>
                                                    <td><?php echo $record_list['status']; ?></td>
                                                        <?php
                                                        echo
                                                        "<td><form action=\"cancel_proccess.php\" method=\"post\">"
                                                        . "<input style=\"display:none;\" type=\"text\" name=\"id\" value=\"" . $record_list['id'] . "\" />"
                                                        . "<input style=\"display:none;\" type=\"text\" name=\"date\" value=\"" . $record_list['status'] . "\" />"
                                                        . "<input style=\"display:none;\" type=\"text\" name=\"time\" value=\"" . $record_list['time'] . "\" />"
                                                        . "<button type=\"submit\" name=\"submit\" class=\"btn btn-outline-danger\">X</button></form></td>"
                                                        ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->
                <!-- Footer -->
                <?php include 'patientFooter.php'; ?>
                <!-- End of Footer -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="patientlogout.php?logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="../../Content/vendor/jquery/jquery.min.js" type="text/javascript"></script>
            <script src="../../Content/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

            <!-- Core plugin JavaScript-->
            <script src="../../Content/vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

            <!-- Custom scripts for all pages-->
            <script src="../../Content/js/sb-admin-2.min.js" type="text/javascript"></script>

            <!-- Page level plugins -->
            <script src="../../Content/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../../Content/vendor/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

            <!-- Page level custom scripts -->
            <script src="../../Content/js/demo/datatables-demo.js" type="text/javascript"></script>
    </body>

</html>

