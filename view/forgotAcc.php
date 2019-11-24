<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
        <title>Search Account</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
        <link href="../Content/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/style.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            #form {
                width: 60%;
                height: 200px;
                margin-top: 171px;
                margin-left: auto;
                margin-right: auto;
                border: 1px solid lightgray;
                border-radius: 5px;
                margin-bottom: 150px;
                box-shadow: 1px 1px 10px grey;
            }
            #innerform{
                width: 50%;
                margin-top: 40px;
                margin-left: auto;
                margin-right: auto;
            }
            #formTitle h2{
                font-family: 'Francois One', sans-serif;
                margin-top: 20px;
                margin-left: 20px;
                border-bottom: 1px solid black;
                width: 90%;
            }
            #button{
                float: right;
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
        <div id="form">
            <div id="formTitle">
                <h2>
                    Find Your Account
                </h2>
            </div>
            <form id="innerform" method="post" action="../controller/forgotAccProccess.php" autocomplete="off">
                <div class="form-part" id="form-left">
                    <div class="form-group">
                        <label>Please enter your email to search for your account.</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group" id="button">
                    <button type="submit" name="search" id="search" class="btn btn-primary btn-sm">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <?php include '../view/footer.php'; ?>
    </body>
</html>
