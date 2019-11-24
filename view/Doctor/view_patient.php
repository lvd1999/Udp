<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}

require('../../model/doctor/doctor_functions.php');
include_once '../../model/database.php';
$patient_pps = $_GET['pps'];

$firstname = $_SESSION['first_name2'];
$lastname = $_SESSION['last_name2'];
$profile_pic = $_SESSION['profile_pic2'];
$doctor_pps = $_SESSION['pps2'];

$userDetail = get_patient($patient_pps);
$userDetail2 = get_address($patient_pps);

$doctor_additional_info = get_additional_info_by_pps($doctor_pps);
$patient_records_list = get_patient_pastrecords_by_pps($patient_pps)
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doctor - Settings</title>

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
                margin-top: -15%;

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

                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <?php
                                    if (is_null($userDetail['profile_pic'])) {
                                        echo "<img src='../../Content/img/avatar.jpg' onClick='triggerClick()' id='profileDisplay'>";
                                    } else {
                                        echo "<img src='" . "../../Content/img/" . $userDetail['profile_pic'] . "' onClick='triggerClick()' id='profileDisplay'>";
                                    }
                                    ?>
                                    <form action="uploadImage.php" method="post" enctype="multipart/form-data" id="upload_image">
                                        <?php if (!empty($msg)): ?>
                                            <div class="alert <?php echo $msg_class ?>" role="alert">
                                                <?php echo $$msg; ?>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                                        <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save Image</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h3>
                                        <?php echo "$firstname $lastname"; ?>
                                    </h3>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Additional</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form class="profile-edit-btn" action="patient_update_form.php">
                                    <input class="form-control" type="submit" value="Edit Profile" />
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                <label>birthdate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['birthdate']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['gender']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['contact_mobile']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail2['street_address']; ?></p>
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
                                                <label>Postcode</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail2['postcode']; ?></p>
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
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Smoker</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['smoker']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Doner</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['doner']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Blood Type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['blood_type']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Allergies</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['allergies']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Diseases</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['diseases']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Immunisations</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userDetail['immunisations']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>
                </div>               

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Past Appointments</h6>
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
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($patient_records_list as $record_list) : ?>
                                        <tr>
                                            <td><?php echo $record_list['id']; ?></td>
                                            <td><?php echo $record_list['d_first_name']; ?> <?php echo $record_list['d_last_name']; ?></td>
                                            <td><?php echo $record_list['name']; ?></td>
                                            <td><?php
                                                $timestamp = strtotime($record_list['time']);
                                                echo date('d-m-Y', $timestamp);
                                                ?></td>
                                            <td><?php
                                                echo date('h.ia', $timestamp);
                                                ?></td>
                                            <td><?php echo $record_list['status']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
                <!-- End of Main Content -->
<!-- Footer -->
            <?php include 'doctorFooter.php'; ?>
            <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
         
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

