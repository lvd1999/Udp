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
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

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

                    <div class="container-fluid">
                        <!--Date table input-->
                        <div class="card shadow mb-4" style="width:98%;margin-left: auto;margin-right: auto;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Make Appointment for your patient</h6>
                            </div>
                            <div class="input-group" style="margin-bottom:10px;">
                                <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>" onchange="showUser(this.value,'<?php echo $doctor_pps ?>')"/>
                            </div>
                            <div id="txtHint" ></div>
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

            <!-- Page level plugins -->
            <script src="../../Content/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../../Content/vendor/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

            <!-- Page level custom scripts -->
            <script src="../../Content/js/demo/datatables-demo.js" type="text/javascript"></script>
    </body>

</html>

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

                                    function showUser(str,pps) {

                                        if (str == "") {
                                            document.getElementById("txtHint").innerHTML = "No data to be shown";
                                            return;
                                        } else {
                                            if (window.XMLHttpRequest) {
                                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp = new XMLHttpRequest();
                                            } else {
                                                // code for IE6, IE5
                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }
                                            xmlhttp.onreadystatechange = function () {
                                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                                }
                                            };
                                            xmlhttp.open("GET", "getschedule.php?s=" + str + pps, true);
                                            console.log(str);
                                            xmlhttp.send();
                                        }
                                    }
</script>