<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}
$_SESSION['doctor'] = true;
$_SESSION['patient'] = NULL;
include_once '../../model/database.php';
require('../../model/doctor/doctor_functions.php');
$firstname = $_SESSION['first_name2'];
$lastname = $_SESSION['last_name2'];
$doctor_pps = $_SESSION['pps2'];
$profile_pic = $_SESSION['profile_pic2'];
$doctor_records_list = get_upcomingrecords_by_pps($doctor_pps);
$sevenDaysReminder = upcomingSevenDaysRecords($doctor_pps);
$alertCancelled = alertCancelled($doctor_pps);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Refresh" content="60"> 

        <title>Doctor - Home</title>

        <!-- Custom fonts for this template-->
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <style>
            #table-wrapper {
                position:relative;
            }
            #table-scroll {
                height:300px;
                overflow:auto;  
                margin-top:20px;
            }
            #table-wrapper table {
                width:100%;

            }
            #table-wrapper table thead th .text {
                position:absolute;   
                top:-20px;
                z-index:2;
                height:20px;
                width:35%;
                border:1px solid red;
            }
        </style>



    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'doctorSideBar.php'; ?>
            <!-- End Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include 'doctorTopBar.php'; ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div>
                        <div class="container-fluid">
                            <div class="card shadow mb-4" style="width:49%;float: left;height: 410px;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Upcoming appointments for next 7 days</h6>
                                </div>
                                <div class="card-body">
                                    <div id="table-wrapper">
                                        <div id="table-scroll">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Appt.ID</th>
                                                            <th>PPS</th>
                                                            <th>Patient</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">
                                                        <?php foreach ($sevenDaysReminder as $record_list) : ?>
                                                            <tr>
                                                                <td><?php
                                                                    echo $record_list['id'];
                                                                    $pps = $record_list['pps_num'];
                                                                    ?></td>
                                                                <td><a href="view_patient.php?pps=<?php echo $pps; ?>"><?php echo $record_list['pps_num']; ?></a></td>
                                                                <td><?php echo $record_list['p_first_name']; ?> <?php echo $record_list['p_last_name']; ?></td>
                                                                <td><?php
                                                                    $timestamp = strtotime($record_list['time']);
                                                                    echo date('d-m-Y', $timestamp);
                                                                    ?></td>
                                                                <td><?php
                                                                    echo date('h.ia', $timestamp);
                                                                    ?></td>

                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card shadow mb-4" style="width:49%;float: left;margin-left: 20px;height: 410px;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Alerts</h6>
                            </div>
                            <div class="card-body">
                                <div id="table-wrapper">
                                    <div id="table-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <tbody id="tbody">
                                                    <?php foreach ($alertCancelled as $ac) : ?>
                                                        <tr>

                                                            <td><i style="color:#ffc042;margin-right: 3px;"class="fas fa-exclamation-triangle"></i><?php
                                                                echo "Patient <strong><a href=\"view_patient.php?pps=" . $ac['pps_num'] . "\">" . $ac['p_first_name'] . " " . $ac['p_last_name'] . "(" . $ac['pps_num'] . ")</a></strong> cancelled an appointment(ID:" . $ac['id'] . ") at<br> ";
                                                                $timestamp = strtotime($ac['time']);
                                                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp" . date('d-m-Y', $timestamp);
                                                                echo "(" . date('h.ia', $timestamp) . ").";
                                                                ?></td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Page Content -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <?php include 'doctorFooter.php'; ?>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->

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



            <!--jQuery--> 
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!--Isolated Version of Bootstrap, not needed if your site already uses Bootstrap--> 
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!--Bootstrap Date-Picker Plugin--> 
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <!--Include all compiled plugins (below), or include individual files as needed--> 
            <script src="../Content/js/bootstrap.min.js" type="text/javascript"></script>
            <script>
                $(document).ready(function () {
                    var date_input = $('input[name="date"]'); //our date input has the name "date"
                    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                    date_input.datepicker({
                        format: 'yyyy-mm-dd',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                    });
                });

                $('table').dataTable({searching: false, paging: false, info: false});
            </script>
            <script>
                var time = new Date().getTime();
                $(document.body).bind("mousemove keypress", function (e) {
                    time = new Date().getTime();
                });

                function refresh() {
                    if (new Date().getTime() - time >= 60000)
                        window.location.reload(true);
                    else
                        setTimeout(refresh, 10000);
                }

                setTimeout(refresh, 10000);
            </script>

            <!-- Page level plugins -->
            <script src="../../Content/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../../Content/vendor/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

            <!-- Page level custom scripts -->
            <script src="../../Content/js/demo/datatables-demo.js" type="text/javascript"></script>
    </body>

</html>

