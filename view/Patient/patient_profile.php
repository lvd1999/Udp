<?php


session_start();
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';

$firstname = $_SESSION['first_name1'];
$lastname = $_SESSION['last_name1'];
$patient_pps = $_SESSION['pps1'];
$userDetail = get_patient($patient_pps);
$profile_pic = $_SESSION['profile_pic'];
$userDetail2 = get_address($patient_pps);
//$county = get_county($patient_pps);
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
                    <h3><?php echo "$firstname $lastname's profile";?></h3>
                    <!--user profile pic-->
                    <?php
                    if (is_null($userDetail['profile_pic'])) {                  //fix this
                        echo "<img src='../../Content/img/avatar.jpg'  id='profileDisplay'>";
                    } else {
                        echo "<img src='" . "../../Content/img/" . $userDetail['profile_pic'] . "'  id='profileDisplay'>";
                    }
                    ?>
                    
                    <!--User details-->
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
                    
                    
                    
                    
                    
                    
                    <button onclick="location.href='patient_update_form.php';">Update Profile</button>
                    <!-- End of page content -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
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
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!--START OF BUG-->
        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
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
        <!--END OF BUG-->
    </body>

</html>
<script src="assets/js/scripts.js"></script>
