<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
        <link href="../Content/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">

            *, *::before, *::after{
                -moz-box-sizing: border-box;
                box-sizing: border-box;

                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            #footer{
                position: relative;
                height: 20%;
                margin-top: 100px;
                width: 100%;
            }
            .Dsign{
                margin-left: 200px;
            }

            .PDsign{
                padding-top: 7em;
                max-width: 100%;
                margin: auto;
                display: block;
                text-align: center;
                width: 100%;
            }

            figure{
                width: 220px;
                height: 230px;
                overflow: hidden;
                position: relative;
                display: inline-block;
                border: 1px solid gray;
                border-radius: 50%;
                box-shadow: 0 0 5px #ddd;
                margin: 6em;
            }

            figcaption{
                position: absolute;
                left: 0; right: 0;
                top: 0; bottom: 0;
                text-align: center;
                font-weight: bold;
                width: 100%;
                height: 100%;
                display: table;
            }

            figcaption div{
                display: table-cell;
                vertical-align: middle;
                position: relative;
                top: 20px;
                opacity: 0;
                color: white;
                text-transform: uppercase;
                
            }

            figcaption div:after{
                position: absolute;
                left: 0; right: 0;
                bottom: 40%;
                text-align: center;
                margin: auto;
                width: 0%;
                height: 2px;
                background: gold;
                text-decoration: none;
            }

            figure:hover figcaption{
                background: rgba(29, 78, 95, 0.3);
            }

            figcaption:hover div{
                opacity: 1;
                top: 0;
                
            }

            figcaption:hover div:after{
                width: 50%;
            }

            figure:hover img{
                -webkit-transform: scale3d(1.02, 1.02, 1);
                transform: scale3d(1.02, 1.02, 1);
            }
            a:hover{
                color: white;
            }
            a{
                color: white;
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
                                <a class="navbar-brand" href="#"><img src="../Content/img/logo.png" class="img-responsive" style="width: 40px; margin-top: -12px;"></a>
                                <a id="navlogoname" class="navbar-brand" href="../index.php">Dr.Book</a>
                            </div>
                            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="../index.php">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <section class="PDsign">
            <figure class="Psign">
                <img src="../Content/img/man.png" alt="patient"/>
                <figcaption><div><a href="Patient/patient_signUp.php">Patient</a></div></figcation>
            </figure>

            <figure class="Dsign">
                <img src="../Content/img/doctor_signup.jpg" alt="doctor"/>
                <figcaption><div><a href="Doctor/doctor_signUp.php">Doctor</a></div></figcation>
            </figure>
        </section>
        <?php include '../view/footer.php'; ?>
    </body>
</html>
