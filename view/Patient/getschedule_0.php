<?php 
require('../../model/patient/patient_functions.php');
include_once '../../model/database.php';
$date = $_POST['date'];
$result = get_bookings($date);

?>


            <?php
            
            
            if (!empty($result)) {
                ?>
<div class="table-responsive">
    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Speciality</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>Book</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
            }
            else
            {
                echo "No doctors available at this date.";
            }
            ?>
                                                            </tbody>
    </table></div>
            