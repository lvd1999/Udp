<?php
include('../../controller/signUp/doctor_signUpProcess.php');
require_once('../../model/database.php');
require('../../model/doctor/doctor_functions.php');
$counties = get_counties();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Doctor - Sign Up</title>
        <!--        <link rel="stylesheet" type="text/css" href="style.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="header">
            <h2>Register as Doctor</h2>
        </div>
        <form method="post" action="doctor_signUp.php" autocomplete="off">
            <?php include('../../controller/signUp/error.php'); ?>
            <div class="input-group">
                <label>First Name</label>
                <input type="text" name="firstname" value="<?php echo $firstname; ?>">
            </div>
            <div class="input-group">
                <label>Last Name</label>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            </div>
            <div class="input-group">
                <label>PPS Number</label>
                <input type="text" name="pps" value="<?php echo $pps; ?>">
            </div>
<!--            <p id="output"></p>-->
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" checked> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="others"> Other<br>  
            </div>
            <div class="input-group">
                <label>Speciality</label>
                <input type="text" name="speciality" value="<?php echo $speciality; ?>">
            </div>
            <div class="input-group">
                <label>County</label>                
                <select name="county" id="county">
                    <?php foreach ($counties as $county) : ?>
                        <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group" id="show_hospitals">
                <label>Hospital</label>
                    <select name="hospital" id="hospital">                      
                            <option value="0">Any</option>
                    </select>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="../../index.php">Sign in</a>
            </p>
        </form>

    </body>
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
</html>