<?php include('../../controller/signUp/patient_signUpProccess.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Patient - Sign Up</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="patient_signUp.php" autocomplete="off">
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
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo $dob; ?>">
            </div>
            <div class="input-group">
                <label>PPS Number</label>
                <input type="text" name="pps" value="<?php echo $pps; ?>">
            </div>
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
</html>