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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
        <link href="../../Content/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- =======================================================
          Theme Name: Medilab
          Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
          Author: BootstrapMade.com
          Author URL: https://bootstrapmade.com
        ======================================================= -->
        
        <style>
            .bg-color {
                margin-bottom: -500px;
            }
            .form-group {
                padding: 5px;
                
            }
            .header {
                margin-left: 325px;
            }
            #loginarea {
                padding: 20px;
                height: 550px;
                width: 1000px;
                margin-left: -420px;
                margin-top: 100px;
                
            }
            .top {
                height: 25px;
            }
            #form-left {
                float: left;
            }
            #form-right {
                float: right;
            }
            #form-right .form-group {
                padding-top: 3px;
                padding-bottom: 3px;
            }
            .form-part {
                width: 400px;
            }
            #footer {
               margin-top: 500px; 
            }
        </style>
    </head>

    <body>
        <section id="banner" class="banner">
            <div class="bg-color">
                <?php include '../../view/header.php'; ?>
                <section class="top">
                </section>
                <div id="loginarea">
                    <div class="header">
                        <h2>Register as Doctor</h2>
                    </div>
                    
                    <form method="post" action="doctor_signUp.php" autocomplete="off">
                        <?php include('../../controller/signUp/error.php'); ?>
                        <div class="form-part" id="form-left">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name"name="lastname" value="<?php echo $lastname; ?>">
                            </div>
                            <div class="form-group">
                                <label>PPS Number</label>
                                <input type="text" class="form-control" placeholder="PPS Number" name="pps" value="<?php echo $pps; ?>">
                            </div>
                <!--            <p id="output"></p>-->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input type="radio" name="gender" value="male" checked> Male
                                <input type="radio" name="gender" value="female"> Female
                                <input type="radio" name="gender" value="others"> Other<br>  
                            </div>
                        </div>
                        <div class="form-part" id="form-right">
                            <div class="form-group">
                                <label>Speciality</label>
                                <input type="text" class="form-control" placeholder="Speciality" name="speciality" value="<?php echo $speciality; ?>">
                            </div>
                            <div class="form-group">
                                <label>County</label>                
                                <select name="county" id="county">
                                    <?php foreach ($counties as $county) : ?>
                                        <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group" id="show_hospitals">
                                <label>Hospital</label>
                                    <select name="hospital" id="hospital">                      
                                            <option value="0">Any</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password_1">
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class="form-control"placeholder="Confirm Password" name="password_2">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
                        </div>
                        <p>
                            Already a member? <a href="../../index.php">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
        <?php include '../../view/footer.php'; ?>      
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
