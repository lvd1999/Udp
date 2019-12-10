<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "drbook");
$q = $_POST['date'];
$res = mysqli_query($con,"SELECT s.id AS schedule_id , s.doctor_id, s.id ,d.d_first_name,d.d_last_name, s.date, s.time, s.status, spec.speciality_name, d.pps_num FROM (schedules  as s INNER JOIN doctors as d ON s.doctor_id = d.id ) INNER JOIN speciality as spec ON d.speciality_id = spec.id WHERE s.date='" . $q . "'"
        . " AND status='available'");

//$_SESSION['doctor_id'] = $data['doctor_id'];
//$_SESSION['date'] = $data['doctor_id'];
//$_SESSION['doctor_id'] = $data['doctor_id'];

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
        echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
        
        } else {
        echo "   <table class='table table-hover'>";
            echo " <thead>";
                echo " <tr>";
                    echo " <th>Doctor</th>";
                    echo " <th>Speciality</th>";
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

                   
                    echo "<td><a href=\"view_doctor.php?pps=" .$row['pps_num']."\">". $row['d_first_name'] . " " .$row['d_last_name'] ."</a></td>";
                    echo "<td>" . $row['speciality_name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
//                    echo "<td>" . $row['status'] ."</span></td>";
                    echo "<td><form action=\"book_proccess.php\" method=\"post\">"
                    . "<input style=\"display:none;\" type=\"text\" name=\"doctor_id\" value=\"" . $row['doctor_id'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"date\" value=\"" . $row['date'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"time\" value=\"" . $row['time'] . "\" />"
                    . "<input style=\"display:none;\" type=\"text\" name=\"schedule_id\" value=\"" . $row['schedule_id'] . "\" />"
                    . "<input type=\"submit\" name=\"submit\" value=\"Book\" Book/> "
                    . "</form></td>";
//                    echo "<td><a href='appointment.php?&appid=" . $row['id'] . "&date=".$q."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate.">Book Now</a></td>";
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