<?php
session_start();

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
                    <h3><?php echo $userDetail['p_first_name']; ?> <?php echo $userDetail['p_last_name']; ?>'s profile</h3>
                    <!--user profile pic-->
                    <?php
                    if (is_null($userDetail['profile_pic'])) {                  //fix this
                        echo "<img src='../../Content/img/avatar.jpg'  id='profileDisplay'>";
                    } else {
                        echo "<img src='" . "../../Content/img/" . $userDetail['profile_pic'] . "'  id='profileDisplay'>";
                    }
                    ?>                    

                    <table>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $userDetail['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><?php echo $userDetail['birthdate']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $userDetail['gender']; ?></td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td><?php echo $userDetail['contact_mobile']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $userDetail2['street_address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Town</td>
                                <td><?php echo $userDetail2['town_city']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Postcode</td>
                                <td><?php echo $userDetail2['postcode']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>County</td>
                                <td><?php echo $userDetail2['county_name']; ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <table>
                        <tbody>
                            <!--additional information-->
                        <h3>Additional information</h3>
                        <tr>
                            <td>Smoker</td>
                            <td><?php echo $userDetail['smoker']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Doner</td>
                            <td><?php echo $userDetail['doner']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Blood Type</td>
                            <td><?php echo $userDetail['blood_type']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Allergies</td>
                            <td><?php echo $userDetail['allergies']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Diseases</td>
                            <td><?php echo $userDetail['diseases']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Immunisations</td>
                            <td><?php echo $userDetail['immunisations']; ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>                   
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

