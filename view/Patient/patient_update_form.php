<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';
$counties = get_counties();

$firstname = $_SESSION['first_name1'];
$lastname = $_SESSION['last_name1'];
$patient_pps = $_SESSION['pps1'];
$userDetail = get_patient($patient_pps);
$userDetail2 = get_address($patient_pps);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
    $firstname = $_POST['patientFirstName'];
    $lastname = $_POST['patientLastName'];
    $birthdate = $_POST['patientDOB'];
    $gender = $_POST['patientGender'];
//    $address = $_POST['address'];
    $contact = $_POST['patientPhone'];
    $email = $_POST['patientEmail'];
    $address = $_POST['patientAddress'];
    $town = $_POST['patientTown'];
    $postcode = $_POST['patientPostcode'];
    $county = $_POST['county'];

    $con = mysqli_connect("localhost", "root", "", "drbook");
    $query2 = "UPDATE patients SET p_first_name='$firstname', p_last_name='$lastname',  birthdate='$birthdate', gender='$gender', contact_mobile='$contact', email='$email' WHERE pps_num='" . $patient_pps . "'";
    $query3 = "UPDATE addresses SET street_address='$address', town_city='$town', postcode='$postcode',county_id='$county' WHERE id='" . $userDetail2['id'] . "'";

    $res = mysqli_query($con, $query2);
    $res2 = mysqli_query($con, $query3);
    $_SESSION['first_name1'] = $firstname;
    $_SESSION['last_name1'] = $lastname;
    header('Location: patient_profile.php');
}
?>
<?php
$male = "";
$female = "";
$other = "";
if ($userDetail['gender'] == 'male') {
    $male = "checked";
} elseif ($userDetail['gender'] == 'female') {
    $female = "checked";
} elseif ($userDetail['gender'] == 'other') {
    $other = "checked";
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Patient - Update Profile</title>

        <!-- Custom fonts for this template-->
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <script src="../../model/patient/scripts.js" type="text/javascript"></script>
        <style type="text/css">
            .emp-profile{
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
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

                    <!--update profile form-->
                    <!-- form start -->
                    <div class="container emp-profile">
                        <form action="<?php $_PHP_SELF ?>" method="post" >
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>PPS Number:</td>
                                        <td><?php echo $userDetail['pps_num']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>First Name:</td>
                                        <td><input type="text" class="form-control" name="patientFirstName" value="<?php echo $userDetail['p_first_name']; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td><input type="text" class="form-control" name="patientLastName" value="<?php echo $userDetail['p_last_name']; ?>"  /></td>
                                    </tr>


                                    <tr>
                                        <td>DOB</td>

                                        <td>
                                            <div class="form-group ">

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                    </div>
                                                    <input class="form-control" id="patientDOB" name="patientDOB" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userDetail['birthdate']; ?>"/>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <!-- radio button -->
                                    <tr>
                                        <td>Gender</td>
                                        <td>
                                            <div class="radio">
                                                <label><input type="radio" name="patientGender" value="male" <?php echo $male; ?>>Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="patientGender" value="female" <?php echo $female; ?>>Female</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="patientGender" value="other" <?php echo $other; ?>>Other</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- radio button end -->

                                    <tr>
                                        <td>Phone number</td>
                                        <td><input type="text" class="form-control" name="patientPhone" value="<?php echo $userDetail['contact_mobile']; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" class="form-control" name="patientEmail" value="<?php echo $userDetail['email']; ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><textarea class="form-control" name="patientAddress"  ><?php echo $userDetail2['street_address']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Town</td>
                                        <td><textarea class="form-control" name="patientTown"  ><?php echo $userDetail2['town_city']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Postcode</td>
                                        <td><textarea class="form-control" name="patientPostcode"  ><?php echo $userDetail2['postcode']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>County</td>
                                        <td><select name="county" id="county">
                                                <option value="<?php echo $userDetail2['county_id']; ?>" selected hidden> <?php echo $userDetail2['county_name']; ?></option>
                                                <?php foreach ($counties as $county) : ?>
                                                    <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>
                        <!-- form end -->
                    </div>
                    <!--End of page content-->
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
        </div>
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

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>
        
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

    </body>

</html>
