<?php
session_start();
if (isset($_SESSION['block'])) {
    header('Location: ../../index.php');
}
include_once '../../model/database.php';
require('../../model/doctor/doctor_functions.php');
$firstname = $_SESSION['first_name2'];
$lastname = $_SESSION['last_name2'];
$doctor_pps = $_SESSION['pps2'];
$profile_pic = $_SESSION['profile_pic2'];

$schedule_list = get_schedule($doctor_pps);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doctor - Schedule</title>

        <!-- Custom fonts for this template-->
        <link href="../../Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template-->
        <link href="../../Content/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>

        <!--date picker-->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Datatable -->

        <style>
            .dataTables_filter, .dataTables_info { display: none; }

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
                    <h1 class="h3 mb-4 text-gray-800">Schedule your timetable</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="">
                            <input type="text" onchange="dateChange(this.value)" class="form-control" id="datepicker" placeholder="Selected date">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>09:00-10:00</th>
                                            <th>10:00-11:00</th>
                                            <th>11:00-12:00</th>
                                            <th>12:00-13:00</th>
                                            <th>13:00-14:00</th>
                                            <th>14:00-15:00</th>
                                            <th>15:00-16:00</th>
                                            <th>16:00-17:00</th>
                                            <th>17:00-18:00</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td id="mon" >Monday</td>
                                            <td class="cells" onClick="tableClick(this, 0, '09')"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 10)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 11)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 12)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 13)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 15)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 16)"></td>
                                            <td class="cells" onClick="tableClick(this, 0, 17)"></td>
                                        </tr>
                                        <tr>
                                            <td id="tues">Tuesday</td>
                                            <td class="cells" onClick="tableClick(this, 1, '09')"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 10)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 11)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 12)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 13)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 15)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 1, 15)"></td>
                                        </tr>
                                        <tr>
                                            <td id="wed">Wednesday</td>
                                            <td class="cells" onClick="tableClick(this, 2, '09')"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 10)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 11)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 12)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 13)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 15)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 16)"></td>
                                            <td class="cells" onClick="tableClick(this, 2, 17)"></td>
                                        </tr>
                                        <tr>
                                            <td id="thurs">Thursday</td>
                                            <td class="cells" onClick="tableClick(this, 3, '09')"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 10)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 11)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 12)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 13)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 15)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 16)"></td>
                                            <td class="cells" onClick="tableClick(this, 3, 17)"></td>
                                        </tr>
                                        <tr>
                                            <td id="fri">Friday</td>
                                            <td class="cells" onClick="tableClick(this, 4, '09')"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 10)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 11)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 12)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 13)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 14)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 15)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 16)"></td>
                                            <td class="cells" onClick="tableClick(this, 4, 17)"></td>
                                        </tr>
                                    </tbody>
                                </table>                                
                            </div>
                            <button id="send" onClick="send">Update</button>
                        </div>
                    </div>
                    <div id="show_hospitals">

                    </div>

                    <!-- End Page Content -->

                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->
                <!-- Footer -->
                <?php include 'doctorFooter.php'; ?>
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



            <!--jQuery--> 
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!--Isolated Version of Bootstrap, not needed if your site already uses Bootstrap--> 
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!--Bootstrap Date-Picker Plugin--> 
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <!--Include all compiled plugins (below), or include individual files as needed--> 
            <script src="../Content/js/bootstrap.min.js" type="text/javascript"></script>

            <script type="text/javascript">
                                var currentWeek = [];
                                var availableTime = new Array();
                                var currentWeekByTime = [];
                                var string;

                                $('#datepicker').datepicker({
                                    autoclose: true,
                                    startDate: getMonday(new Date()),
                                    "setDate": getMonday(new Date()),
                                    daysOfWeekDisabled: "0,2,3,4,5,6"
                                });
                                function getMonday(d) {
                                    d = new Date(d);
                                    var day = d.getDay(),
                                            diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
                                    return new Date(d.setDate(diff));
                                }
                                function getDateString(currentday, currentDate) {
                                    var today = new Date(currentDate);
                                    today.setDate(today.getDate() + currentday);
                                    var str = today.toISOString();
                                    this.currentWeek[currentday] = str;
                                    var month = str.substr(5, 2);
                                    var day = str.substr(8, 2);
                                    console.log(str);
                                    return day + "/" + month;
                                }
                                function tableClick(event, currentDay, start) {
                                    if (event.style.backgroundColor == "rgb(240, 215, 204)") {
                                        event.style.backgroundColor = "#ffffff";
                                        //remove from list
                                        var value = this.availableTime.indexOf(this.currentWeek[currentDay].substr(0, 11) + "" + start + this.currentWeek[currentDay].substr(13, 11));
                                        this.availableTime.splice(value, 1);
                                    } else {
                                        event.style.backgroundColor = "#f0d7cc";
                                        this.availableTime.push(this.currentWeek[currentDay].substr(0, 11) + "" + start + this.currentWeek[currentDay].substr(13, 11));
                                        this.string = JSON.stringify(this.availableTime);
                                    }
                                    console.log(this.availableTime);
                                    console.log(this.string);
                                }

                                function generateArray() {
                                    var i = 0;

                                    var j = 0;
                                    while (i < 45)
                                    {
                                        this.currentWeekByTime[i + 0] = this.currentWeek[j].substr(0, 11) + "09:00:00.000Z";
                                        this.currentWeekByTime[i + 1] = this.currentWeek[j].substr(0, 11) + "10:00:00.000Z";
                                        this.currentWeekByTime[i + 2] = this.currentWeek[j].substr(0, 11) + "11:00:00.000Z";
                                        this.currentWeekByTime[i + 3] = this.currentWeek[j].substr(0, 11) + "12:00:00.000Z";
                                        this.currentWeekByTime[i + 4] = this.currentWeek[j].substr(0, 11) + "13:00:00.000Z";
                                        this.currentWeekByTime[i + 5] = this.currentWeek[j].substr(0, 11) + "14:00:00.000Z";
                                        this.currentWeekByTime[i + 6] = this.currentWeek[j].substr(0, 11) + "15:00:00.000Z";
                                        this.currentWeekByTime[i + 7] = this.currentWeek[j].substr(0, 11) + "16:00:00.000Z";
                                        this.currentWeekByTime[i + 8] = this.currentWeek[j].substr(0, 11) + "17:00:00.000Z";
                                        i += 9;
                                        j += 1;
                                    }
                                }

                                $(document).ready(function () {
                                    $('#send').click(function () {
                                        console.log("hi " + availableTime);
                                        $.ajax({
                                            url: "../../model/doctor/scheduleOut.php",
                                            method: "POST",
                                            data: {time: availableTime},
                                            success: function (data) {
                                                console.log("success: " + data);
                                            }
                                        });
                                    });

                                });

                                function dateChange(val) {
                                    var str = val;

                                    document.getElementById("mon").textContent = "Monday" + "(" + getDateString(0, str) + ")";
                                    document.getElementById("tues").textContent = "Tuesday" + "(" + getDateString(1, str) + ")";
                                    document.getElementById("wed").textContent = "Wednesday " + "(" + getDateString(2, str) + ")";
                                    document.getElementById("thurs").textContent = "Thursday " + "(" + getDateString(3, str) + ")";
                                    document.getElementById("fri").textContent = "Friday " + "(" + getDateString(4, str) + ")";
                                    this.generateArray();
                                    var x = document.getElementById("tbody");
<?php
$lists = array();
foreach ($schedule_list as $schedule) :
    $x = $schedule['date'] . 'T' . $schedule['time'] . '.000Z';
    array_push($lists, $x);
endforeach;
$js_array = json_encode($lists);
?>
                                    var arrayIn = <?php echo $js_array ?>;
                                    for (i = 0; i <= 44; i++)
                                    {
                                        if (this.availableTime.indexOf(this.currentWeekByTime[i]) != -1 || arrayIn.indexOf(this.currentWeekByTime[i]) != -1) {
                                            x.getElementsByClassName("cells")[i].style.backgroundColor = "#f0d7cc";
                                        } else {
                                            x.getElementsByClassName("cells")[i].style.backgroundColor = "#ffffff";
                                        }
                                    }
                                }
            </script>
            <script>
                $(document).ready(function () {
                    $('table').DataTable({
                        "paging": false,
                        "ordering": false,
                        "info": false
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

