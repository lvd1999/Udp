<?php include('../../controller/signUp/patient_signUpProccess.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
        <title>Patient - Sign Up</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
        <link href="../../Content/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Content/css/style.css" rel="stylesheet" type="text/css"/>
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
                height: 500px;
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
            #gender {
                padding-top: 25px;
                padding-bottom: 25px;
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
            <div class="header">
                <h2>Register as Patient</h2>
            </div>

            <form method="post" action="patient_signUp.php" autocomplete="off">
                <?php include('../../controller/signUp/error.php'); ?>
                <div class="form-part" id="form-left">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">
                    </div>
                    <div class="form-group">
                        <label>PPS Number</label>
                        <input type="text" class="form-control" name="pps" placeholder="PPS number" value="<?php echo $pps; ?>">
                    </div>
                </div>
                <div class="form-part" id="form-right">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group" id="gender">
                        <label>Gender</label>
                        <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female
                        <input type="radio" name="gender" value="others"> Other<br>  
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password_1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="password_2" placeholder="Confirm password">
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
</html>
