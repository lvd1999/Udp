<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';
$doctor_pps = $_GET['pps'];

$firstname = $_SESSION['first_name1'];
$lastname = $_SESSION['last_name1'];
$firstname2 = $_SESSION['first_name2'];
$lastname2 = $_SESSION['last_name2'];
$patient_pps = $_SESSION['pps1'];
$patient_records_list = get_pastrecords_by_pps($patient_pps);
$userDetail = get_doctor($doctor_pps);
$profile_pic = $_SESSION['profile_pic2'];
$userDetail2 = get_hospital($doctor_pps);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Patient - Home</title>

        <!-- Custom fonts for this template-->
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Datatable -->
        <style type="text/css">

            .emp-profile{
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }
            .profile-img{
                text-align: center;
            }
            .profile-img img{
                width: 70%;
                height: 100%;
                margin-bottom: 2em;
            }
            .profile-img button{
                border: none;
                border-radius: 0;
                font-size: 15px;
                margin-left: 3.3em;
                width: 70%;
            }

            .profile-head h3{
                color: #0062cc;
            }
            .profile-edit-btn{
                border: none;
                border-radius: 1.5rem;
                width: 70%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }
            .profile-head .nav-tabs{
                margin-top: 10%;
                margin-bottom:5%;
            }
            .profile-head .nav-tabs .nav-link{
                font-weight:600;
                border: none;
            }
            .profile-head .nav-tabs .nav-link.active{
                border: none;
                border-bottom:2px solid #0062cc;
            }
            #myTabContent{
                margin-left: 55%;
                margin-top: 0;

            }
            .profile-tab label{
                font-weight: 600;
            }
            .profile-tab p{
                width: 150px;
                margin-left: 4em;
                font-weight: 600;
                color: #0062cc;
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
                    <?php include 'patientTopBar.php'; ?>
                    <!-- Main Content -->
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <?php
                                    echo "<img src='" . "../../Content/img/" . $profile_pic . "' onClick='triggerClick()' id='profileDisplay' height=\"100\" width=\"100\">";
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <h3>
                                        <?php echo $userDetail['d_first_name'] . " " .$userDetail['d_last_name']; ?>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Additional</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">   
                                                <div class="col-md-6">
                                                    <label>PPS Number</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['pps_num']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['email']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>First Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['d_first_name']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Last Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['d_last_name']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['gender']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Hospital</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail2['hospital_name']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Town</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail2['town_city']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>County</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail2['county_name']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>University</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['university']; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Course</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['course']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Conferal Date</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['conferal_date']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Restration Number</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userDetail['registration_num']; ?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php include 'patientFooter.php'; ?>
                <!-- End of Footer -->
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
                </script>

                <!-- Page level plugins -->
                <script src="../../Content/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
                <script src="../../Content/vendor/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>

                <!-- Page level custom scripts -->
                <script src="../../Content/js/demo/datatables-demo.js" type="text/javascript"></script>
                </body>

                </html>

