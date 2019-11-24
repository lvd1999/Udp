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
$patient_records_list = get_pastrecords_by_pps($patient_pps);
$patient_medical_info = get_medical_info_by_pps($patient_pps);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Patient - Settings</title>

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
                    <div id="settingTitle">
                        <h1>Settings</h1>
                    </div>
                    <div id="settings1" class="container-fluid">

                        <!-- Page Heading -->
                        <div id="settingsMenu">
                            <div id="settingsMenu1">
                                <ul>
                                    <li><a href="#" style="background: #8facff;color: black; font-weight: bold">Your Medical </br>Information</a></li>
                                    <li><a href="patient_securityAndLogin.php" >Security and Login</a></li>
                                </ul>
                            </div>
                        </div>

                        <div id="settings1Content">
                            <form action="../../controller/patient/settings.php" method="POST">
                                <div>
                                    <label style="margin-right: 40px;">Smoker</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary <?php
                    if ($patient_medical_info['smoker'] == 1) {
                        echo 'active ';
                    }
                    ?>">
                                            <input value="1" type="radio" name="smoker" id="option1" autocomplete="off" 
                                            <?php
                                            if ($patient_medical_info['smoker'] == 1) {
                                                echo 'checked ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['smoker'] == 0) {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="0" type="radio" name="smoker" id="option2" autocomplete="off"
                                            <?php
                                            if ($patient_medical_info['smoker'] == 0) {
                                                echo 'checked';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label style="margin-right: 50px;">Doner</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['doner'] == 1) {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="1" type="radio" name="doner" id="option1" autocomplete="off"

                                                   <?php
                                                   if ($patient_medical_info['doner'] == 1) {
                                                       echo 'checked';
                                                   }
                                                   ?>> 
                                            Yes
                                        </label>
                                        <label class="btn btn-secondary <?php
                                                   if ($patient_medical_info['doner'] == 0) {
                                                       echo 'active ';
                                                   }
                                                   ?>">
                                            <input value="0" type="radio" name="doner" id="option2" autocomplete="off"
                                            <?php
                                            if ($patient_medical_info['doner'] == 0) {
                                                echo 'checked';
                                            }
                                            ?>> 
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label style="margin-right: 13px;">Blood Type</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'A+') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="A+" type="radio" name="bloodtype" id="option1" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'A+') {
                                            echo 'checked ';
                                        }
                                            ?>> A+
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'A-') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="A-" type="radio" name="bloodtype" id="option2" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'A-') {
                                            echo 'checked ';
                                        }
                                            ?>> A-
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'B+') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="B+" type="radio" name="bloodtype" id="option1" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'B+') {
                                            echo 'checked ';
                                        }
                                            ?>> B+
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'B-') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="B-" type="radio" name="bloodtype" id="option2" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'B-') {
                                            echo 'checked ';
                                        }
                                            ?>> B-
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'AB+') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="AB+" type="radio" name="bloodtype" id="option1" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'AB+') {
                                            echo 'checked ';
                                        }
                                            ?>> AB+
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'AB-') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="AB-" type="radio" name="bloodtype" id="option2" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'AB-') {
                                            echo 'checked ';
                                        }
                                            ?>> AB-
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'O+') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="O+" type="radio" name="bloodtype" id="option1" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'O+') {
                                            echo 'checked ';
                                        }
                                            ?>> O+
                                        </label>
                                        <label class="btn btn-secondary <?php
                                            if ($patient_medical_info['blood_type'] == 'O-') {
                                                echo 'active ';
                                            }
                                            ?>">
                                            <input value="O-" type="radio" name="bloodtype" id="option2" autocomplete="off" <?php
                                        if ($patient_medical_info['blood_type'] == 'O-') {
                                            echo 'checked ';
                                        }
                                            ?>> O-
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label>Allergies</label>
                                    <input type="text" name="allergies" value="<?php echo $patient_medical_info['allergies'] ?>">                            
                                </div>
                                <label>Cereals containing gluten, Eggs, Milk</label>
                                <div class="input-group">
                                    <label>Diseases</label>
                                    <input type="text" name="diseases" value="<?php echo $patient_medical_info['diseases'] ?>">                            
                                </div>
                                <label>G6PD, Asthma, Diabetes, Hypertension, Hypercholesterolemia</label>
                                <div class="input-group">
                                    <label>Immunisations</label>
                                    <input type="text" name="immunisations" value="<?php echo $patient_medical_info['immunisations'] ?>">                            
                                </div>
                                <label>Hepatitis B, Polio, MMR, HPV</label>

                                <div class="form-action">
                                    <button type="submit" class="btn btn-primary btn-block" name="patient_settings">Update</button>
                                </div>
                            </form>
                        </div>
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

