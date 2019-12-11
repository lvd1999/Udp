<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "drbook");
$string = $_GET['s'];
$q = substr($string, 0,10);
$pps = substr($string, 10);
$res = mysqli_query($con,"SELECT s.id AS schedule_id , s.doctor_id, s.id ,d.d_first_name,d.d_last_name, s.date, s.time, s.status, spec.speciality_name, d.pps_num FROM (schedules  as s INNER JOIN doctors as d ON s.doctor_id = d.id ) INNER JOIN speciality as spec ON d.speciality_id = spec.id WHERE s.date='" . $q . "'"
        . " AND status='available' AND d.pps_num = '" . $pps . "'");
//$_SESSION['doctor_id'] = $data['doctor_id'];
//$_SESSION['date'] = $data['doctor_id'];
//$_SESSION['doctor_id'] = $data['doctor_id'];
if (!isset($patient_pps)) {
    $patient_pps = '';
}
if (!$res) {
die("Error running $sql: " . mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (mysqli_num_rows($res)==0) {
        echo "<div style='width:98%;margin:0px auto 10px auto;' class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
        
        } else {
        echo "   <table class='table table-bordered mt-3' id='dataTable' style='width:98%;margin-left:auto;margin-right:auto;' cellspacing='0'>";
            echo " <thead>";
                echo " <tr>";
                    echo " <th>Date</th>";
                    echo "  <th>Start Time</th>";
//                    echo " <th>Availability</th>";
                    echo "  <th>Book Now!</th>";
                    
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <?php
                    if ($row['status']!='available') {
                    $avail="danger";
                    $btnstate="disabled";
                    $btnclick="danger";
                    } else {
                    $avail="primary";
                    $btnstate="";
                    $btnclick="primary";
                    }

                   
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
//                    echo "<td>" . $row['status'] ."</span></td>";
                    echo "<td><form action=\"book_proccess.php\" method=\"post\">"
                    ."<input required type='text' class='form-control' name='p_pps' placeholder='PPS number' value='$patient_pps'>"
                    . "<input style=\"display:none;\" type=\"text\" name=\"doctor_id\" value=\"" . $row['doctor_id'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"date\" value=\"" . $row['date'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"time\" value=\"" . $row['time'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"schedule_id\" value=\"" . $row['schedule_id'] . "\" />"
                    . "<button style=\"margin-top:6px;\" type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Book\"> Book</button>"
                    . "</form></td>";
//                    
                    
                    ?>
                    
                    </script>
                    <!-- ?> -->
                </tr>
                
                <?php
                }
                }
                ?>
            </tbody>
            <!-- modal start -->
            
            
            
            
            
        </body>
    </html>