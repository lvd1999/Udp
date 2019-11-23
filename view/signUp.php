<title>Sign Up</title>

<?php include 'header.php'; ?>

<style type="text/css">

    *, *::before, *::after{
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    #footer{
        position: relative;
        height: 25%;
        margin-top: 15em;
        width: 100%;
    }

    .PDsign{
        padding-top: 7em;
        max-width: 100%;
        margin: auto;
        display: block;
        text-align: center;
        width: 60%;
    }

    figure{
        width: 220px;
        height: 230px;
        overflow: hidden;
        position: relative;
        display: inline-block;
        border: 5px solid #fff;
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
        color: #2c3e50;
        text-transform: uppercase;
    }

    figcaption div:after{
        position: absolute;
        content: "";
        left: 0; right: 0;
        bottom: 40%;
        text-align: center;
        margin: auto;
        width: 0%;
        height: 2px;
        background: #2c3e50;
    }

    figure img{
        -webkit-transition: all 0.5s linear;
        transition: all 0.5s linear;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }

    figure:hover figcaption{
        background: rgba(255,255,255,0.3);
    }

    figcaption:hover div{
        opacity: 1;
        top: 0;
    }

    figcaption:hover div:after{
        width: 50%;
    }

    figure:hover img{
        -webkit-transform: scale3d(1.2, 1.2, 1);
        transform: scale3d(1.2, 1.2, 1);
    }

</style>
<section class="PDsign">
    <figure class="Psign">
        <img src="../Content/img/user-profile.png" width=220px height=230px/>
        <figcaption><div><a href="Patient/patient_signUp.php">Patient</a></div></figcation>
    </figure>

    <figure class="Dsign">
        <img src="../Content/img/doctor-icon.jpg" width=220px height=230px/></a>
        <figcaption><div><a href="Doctor/doctor_signUp.php">Doctor</a></div></figcation>
    </figure>
</section>


