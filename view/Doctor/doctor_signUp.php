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
                margin-left: -620px;
                margin-top: 85px;
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
                margin-top: 200px; 
            }

        </style>
    </head>

    <body>
        <section class="banner">
            <div >
                <nav class="navbar navbar-default navbar-fixed-top" style="height:73px; background: #1D4E5F;opacity: 0.9;">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="../../Content/img/logo.png" class="img-responsive" style="width: 40px; margin-top: -12px;"></a>
                                <a id="navlogoname" class="navbar-brand" href="../../index.php">Dr.Book</a>
                            </div>
                            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="../../index.php">Home</a></li>
                                    <li class=""><a href="../signUp.php">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <div id="loginarea">
            <div class="header" style="margin-bottom:20px;">
                <h2>Register as Doctor</h2>
            </div>

            <form method="post" action="../../controller/signUp/doctor_signUpProcess.php" autocomplete="off">
                <div class="form-part" id="form-left">
                    <div class="form-group">
                        <label>First Name</label>
                        <input required type="text" class="form-control" placeholder="First Name" name="firstname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input required type="text" class="form-control" placeholder="Last Name"name="lastname">
                    </div>
                    <div class="form-group">
                        <label>PPS Number</label>
                        <input required type="text" class="form-control" placeholder="PPS Number" name="pps">
                    </div>
        <!--            <p id="output"></p>-->
                    <div class="form-group">
                        <label>Email</label>
                        <input required type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input required type="radio" name="gender" value="male" checked> Male
                        <input required type="radio" name="gender" value="female"> Female
                        <input required type="radio" name="gender" value="others"> Other<br>  
                    </div>
                </div>
                <div class="form-part" id="form-right">
                    <div class="form-group">
                        <label>Speciality</label>
                        <input required type="text" class="form-control" placeholder="Speciality" name="speciality">
                    </div>
                    <div class="form-group">
                        <label>County</label>                
                        <select required name="county" id="county">
                            <?php foreach ($counties as $county) : ?>
                                <option value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group" id="show_hospitals">
                        <label>Hospital</label>
                        <select required name="hospital" id="hospital">                      
                            <option value="0">-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password_1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control"placeholder="Confirm Password" name="password_2" required>
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
