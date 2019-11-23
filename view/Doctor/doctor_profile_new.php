<?php
session_start();
require('../../model/doctor/doctor_functions.php');
include_once '../../model/database.php';

$firstname = $_SESSION['first_name2'];
$lastname = $_SESSION['last_name2'];
$doctor_pps = $_SESSION['pps2'];
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

        <title>Doctor - Profile new</title>

        <!-- Custom fonts for this template-->
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'doctorSideBar.php'; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!--Main content-->
                <!-- Topbar -->
                <?php include 'doctorTopBar.php'; ?>
                <!-- End of Topbar -->
                
                <!--Start profile-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php
                            if (is_null($userDetail['profile_pic'])) {                  //fix this
                                echo "<img src='../../Content/img/avatar.jpg'  id='profileDisplay'> class=\"rounded float-left\"";
                            } else {
                                echo "<img class=\"rounded float-left\" src='" . "../../Content/img/" . $userDetail['profile_pic'] . "'  id='profileDisplay'>";
                            }
                            ?>
                            <div class="col-lg-12">
                                
                                <form action="doctor_update_form.php">
                        <input type="submit" value="Update Profile" class="btn btn-primary btn-md m-3"/>
                    </form>
                            </div>
                        </div>
                        <div class="col-lg-8 text-dark">
                            <dl class="row">
                                <dt class="col-sm-12 "><p class="h2 font-weight-bolder mb-4"><?php echo $firstname; ?> <?php echo $lastname; ?></p></dt>
                                <dt class="col-sm-3">PPS Number</dt>
                                <dd class="col-sm-9"><?php echo $userDetail['pps_num']; ?></dd>
                                <dt class="col-sm-3">Speciality</dt>
                                <dd class="col-sm-9"><?php echo $userDetail['speciality_id']; ?></dd>

                                <dt class="col-sm-3">Email</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['email']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Gender</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['gender']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Hospital</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail2['hospital_name']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Town</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail2['town_city']; ?></p>
                                </dd>
                                <dt class="col-sm-3">County</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail2['county_name']; ?></p>
                                </dd>
                            </dl>
                            
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">Qualifications</h5>
                                <div class="card-body">
                                    <dt class="col-sm-3">University</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['university']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Course</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['course']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Conferal Date</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['conferal_date']; ?></p>
                                </dd>
                                <dt class="col-sm-3">Registration Number</dt>
                                <dd class="col-sm-9">
                                    <p><?php echo $userDetail['registration_num']; ?></p>
                                </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <!--end of main content-->
                    

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


    </body>

</html>

