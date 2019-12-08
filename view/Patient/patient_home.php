<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}

$_SESSION['patient'] = true;
$_SESSION['doctor'] = NULL;
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';

$firstname = $_SESSION['first_name1'];
$lastname = $_SESSION['last_name1'];
$patient_pps = $_SESSION['pps1'];
$patient_records_list = get_pastrecords_by_pps($patient_pps);

//filter booking
$db_handle = new DBController();
$specialityResult = $db_handle->runQuery("SELECT DISTINCT spc.speciality_name FROM ((doctors as d INNER JOIN schedules as s ON s.doctor_id = d.id)INNER JOIN speciality as spc)");
$nextThree = nextThreeRecords($patient_pps);
$pieChart = pieChartPastAppointments($patient_pps);
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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <style>
            .dataTables_filter, .dataTables_info { display: none; }
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

                    <!-- Begin Page Content -->


                    <div id="home_1" class="container-fluid" style="display:inline-block;">
                        <div class="card shadow mb-4" style="width:49%;float: left;height: 410px;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Your next 3 appointments</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Appt.ID</th>
                                                <th>Doctor</th>
                                                <th>Hospital</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php foreach ($nextThree as $record_list) : ?>
                                                <tr>
                                                    <td><?php
                                                        echo $record_list['id'];
                                                        $pps = $record_list['pps_num'];
                                                        ?></td>
                                                    <td><a href="view_doctor.php?pps=<?php echo $pps; ?>"><?php echo $record_list['d_first_name']; ?> <?php echo $record_list['d_last_name']; ?></td>
                                                    <td><?php echo $record_list['name']; ?></td>
                                                    <td style="color:orange;"><strong><?php
                                                            $timestamp = strtotime($record_list['time']);
                                                            echo date('d-m-Y', $timestamp);
                                                            ?></strong></td>
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
                        <div class="card shadow mb-4" style="width:49%;float: left;margin-left: 20px;height: 410px;">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Number of past appointments in this year</h6>
                            </div>
                            <div class="card-body">
                                <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="card shadow mb-4" style="width:100%;height: auto;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Book Appointment</h6>
                                </div>
                                <!--FILTER SYSTEM-->
                                <div style="width:98%;margin: 15px auto">
                                    <form method="POST" name="search" action="patient_home.php">
                                        Select date: <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>" />

                                        Select speciality:
                                        <div class="search-box">
                                            <select id="Place" name="speciality[]">
                                                <?php
                                                if (!empty($specialityResult)) {
                                                    foreach ($specialityResult as $key => $value) {
                                                        echo '<option value="' . $specialityResult[$key]['speciality_name'] . '">' . $specialityResult[$key]['speciality_name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select><br><br>

<!--<input type="date" name="date" value=>-->

                                            <button id="Filter">Search</button>
                                        </div>

                                        <?php
                                        if (!empty($_POST['speciality'])) {
                                            ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th><strong>Name</strong></th>
                                                        <th><strong>Speciality</strong></th>
                                                        <th><strong>Date</strong></th>
                                                        <th><strong>Start Time</strong></th>
                                                        <th><strong>Book</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    $selectedOptionCount = count($_POST['speciality']);
                                                    $date = $_POST['date'];
                                                    $selectedOption = "";
                                                    while ($i < $selectedOptionCount) {
                                                        $selectedOption = $selectedOption . $_POST['speciality'][$i];
                                                        if ($i < $selectedOptionCount - 1) {
                                                            $selectedOption = $selectedOption . ", ";
                                                        }

                                                        $i ++;
                                                    }
                                                    $query = "SELECT sch.id as schedule_id, d.pps_num, spc.speciality_name, sch.date, sch.time, sch.doctor_id, d.d_first_name, d.d_last_name FROM ((schedules as sch INNER JOIN doctors as d ON sch.doctor_id = d.id)
INNER JOIN speciality as spc ON d.speciality_id = spc.id) where speciality_name = \"" . $selectedOption . "\"" . " AND date=" . "\"" . $date . "\"" . " AND status=\"available\"";
                                                    $result = $db_handle->runQuery($query);
                                                }
                                                if (!empty($result)) {
                                                    foreach ($result as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td><a href="view_doctor.php?pps=<?php echo $result[$key]['pps_num']; ?>"/><div class="col" id="user_data_1"><?php echo $result[$key]['d_first_name'] . " " . $result[$key]['d_last_name']; ?></div></td>
                                                            <td><div class="col" id="user_data_2"><?php echo $result[$key]['speciality_name']; ?> </div></td>
                                                            <td><div class="col" id="user_data_3"><?php echo $result[$key]['date']; ?> </div></td>
                                                            <td><div class="col" id="user_data_4"><?php echo $result[$key]['time']; ?> </div></td>
                                                            <?php
                                                            echo "<td><form action=\"book_proccess.php\" method=\"post\">"
                                                            . "<input style=\"display:none;\" type=\"text\" name=\"doctor_id\" value=\"" . $result[$key]['doctor_id'] . "\" />"
                                                            . "<input style=\"display:none;\" type=\"text\" name=\"date\" value=\"" . $result[$key]['date'] . "\" />"
                                                            . "<input style=\"display:none;\" type=\"text\" name=\"time\" value=\"" . $result[$key]['time'] . "\" />"
                                                            . "<input style=\"display:none;\" type=\"text\" name=\"schedule_id\" value=\"" . $result[$key]['schedule_id'] . "\" />"
                                                            . "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Book\"> Book</button> "
                                                            . "</form></td>";
                                                            ?>
                                                            
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                </tbody>
                                                </table>
                                            </div>
                                                
                                                
                                            
                                            <?php
                                        }
                                        ?>  

                                    </form>
                                </div>
                            </div>
                            <!--End of booking-->

                            <!-- Page Heading -->



                            <!--End of date table-->

                            <!-- Page Heading -->



                        </div>



                    </div>
                </div>
                <!-- End of Main Content -->
                <!-- End of Content Wrapper -->
                <!-- Footer -->

                <div style="margin-top:100px;"></div>
                <?php include 'patientFooter.php'; ?>

                <!-- End of Footer -->

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
                <script>
                    function showUser(str) {

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
                            xmlhttp.open("GET", "getschedule.php?q=" + str, true);
                            console.log(str);
                            xmlhttp.send();
                        }
                    }
                    $('table').dataTable({searching: false, paging: false, info: false});
                </script>
                <script type="text/javascript">
                    google.charts.load("current", {packages: ["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Month', 'Hours per Day'],
<?php foreach ($pieChart as $pc) : ?>
                                ['<?php echo $pc['month']; ?>',<?php echo $pc['count']; ?>],
<?php endforeach; ?>
                        ]);

                        var options = {
                            title: 'Month',
                            is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                </script>

