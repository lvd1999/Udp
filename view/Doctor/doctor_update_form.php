<?php
session_start();
require('../../model/doctor/doctor_functions.php');
include_once '../../model/database.php';
$counties = get_counties();

$firstname = $_SESSION['first_name2'];
$lastname = $_SESSION['last_name2'];
$doctor_pps = $_SESSION['pps2'];
$userDetail = get_doctor($doctor_pps);
$userDetail2 = get_hospital($doctor_pps);
?>
<!-- update -->
<?php
if (isset($_POST['submit'])) {
//variables
    $firstname = $_POST['patientFirstName'];
    $lastname = $_POST['patientLastName'];    
//    $address = $_POST['address'];
    $email = $_POST['patientEmail'];
    $hospital = $_POST['hospital'];
    
$con = mysqli_connect("localhost","root","","drbook");
$query2 = "UPDATE doctors SET d_first_name='$firstname', d_last_name='$lastname', email='$email' WHERE pps_num='" . $doctor_pps . "'";
$query3 = "UPDATE doctors set hospital_id = '$hospital' WHERE pps_num='" . $doctor_pps . "'";


    $res = mysqli_query($con, $query2);
    $res2 = mysqli_query($con, $query3);
    $_SESSION['first_name2'] = $firstname;
    $_SESSION['last_name2'] = $lastname;
    header('Location: doctor_profile.php');
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
                    <!--user profile pic-->
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
                    
                    
                    <!--update profile form-->
                    <!-- form start -->
                                        <form action="<?php $_PHP_SELF ?>" method="post" >
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>PPS Number:</td>
                                                        <td><?php echo $userDetail['pps_num']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" name="patientFirstName" value="<?php echo $userDetail['d_first_name']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><input type="text" class="form-control" name="patientLastName" value="<?php echo $userDetail['d_last_name']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="patientEmail" value="<?php echo $userDetail['email']; ?>"  /></td>
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
<!--                                                <div id="show_hospitals">
                                                    <label>Hospital</label>
                                                    <select name="hospital" id="hospital">                      
                                                        <option value="0">Any</option>
                                                    </select>
                                                </div>-->
<td>Hospital</td>
<td>
    <select name="hospital" id="show_hospitals">                      
        <!--<option value="0" selected hidden>Any</option>-->
        <option value="<?php echo $userDetail2['hospital_id']; ?>" selected hidden> <?php echo $userDetail2['hospital_name']; ?></option>
                                                    </select>
</td>

                                            </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                    </tr>
                                                </tbody>

                                            </table>



                                        </form>
                                        <!-- form end -->
                    
                    <!--End of page content-->
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
<script src="assets/js/scripts.js"></script>

<script type="text/javascript">
        $(document).ready(function () {
            $('#county').change(function (e) {
                $.ajax({
                    url: "../../model/doctor/get_hospitals.php",
                    method: "POST",
                    data: {county_id: $(e.target).val()},
                    success: function (data) {
                        var assArr = jQuery.parseJSON(data);
                        $("#output").html("Error");
                        if (assArr['success'])
                        {
                            $('#show_hospitals').html(assArr['output']);

                        } else {
                            $("#output").html("Error");
                        }
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        $("#output").html(error);

                    }

                });
            });

        });

    </script>