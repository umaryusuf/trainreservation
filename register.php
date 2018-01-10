<?php require('header.php');
    // set error to false
    $error = false;
    //set messages to empty
    $message = $err_msg = "";
    // set user input errors to empty
    $username_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $email_err = $dob_err = "";
    // set user input variables to empty
    $username = $password = $confirm_password = $first_name = $last_name = $email = $dob = "";

    // if user clicks the register button
    if (isset($_POST['register'])) {
        // sanitizing POST variable
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // setting all field variables
        $username = strtolower(trim($_POST['username']));
        $password = strtolower(trim($_POST['password']));
        $confirm_password = trim($_POST['confirm-password']);
        $first_name = ucfirst(trim($_POST['first-name']));
        $last_name = ucfirst(trim($_POST['last-name']));
        $email = trim($_POST['email']);
        $dob = $_POST['dob'];

        // validate user input
        if (empty($username)) {
            $error = true;
            $username_err = "Username is empty";
        }elseif (strlen($username) < 4) {
           $error = true;
           $username_err = "Must at least 4 characters"; 
        }

        if (empty($password)) {
            $error = true;
            $password_err = "Password is empty";
        }elseif (strlen($password) < 4) {
            $error = true;
            $password_err = "Must at least 4 characters";
        }

        if (empty($confirm_password)) {
            $error = true;
            $confirm_password_err = "Confirm password is empty";
        }elseif ($confirm_password !== $password) {
            $error = true;
            $confirm_password_err = "Passwords do not match";
        }

        if (empty($first_name)) {
            $error = true;
            $first_name_err = "Firstname is empty";
        }elseif (strlen($first_name) < 4) {
            $error = true;
            $first_name_err = "Must at least 4 characters";
        }

        if (empty($last_name)) {
            $error = true;
            $last_name_err = "Lastname  is empty";
        }elseif (strlen($last_name) < 4) {
            $error = true;
            $last_name_err = "Must at least 4 characters";
        }

        if (empty($email)) {
            $error = true;
            $email_err = "Email is empty";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $email_err = "Invalid email address";
        }

        if (empty($dob)) {
            $error = true;
            $dob_err = "Date of birth is empty";
        }
        // end validate user input


        // if no error and no empty field
        if (!$error) {
            // create set date variable to current date
            $date = date("dS M, Y");
            //hash password
            $password = md5($password);

            // check if username exist
            $check_user = mysqli_query($dbc, "SELECT user_id FROM users WHERE username='$username'");
            if (mysqli_num_rows($check_user) > 0) {
                // user already exist
                $username_err = "Username already exist";
            }else{
                // sql insert statement
                $sql = "INSERT INTO users VALUES('', '$username', '$password', '$first_name', '$last_name', '$dob', '$email', '$date', '')";

                // if user is registered
                if (mysqli_query($dbc, $sql)) {
                    // set all fields to empty
                    $username = $password = $confirm_password = $first_name = $last_name = $email = $dob = "";
                    // display success message
                    $message = "Account created please login";
                }else{
                    // set error message - if user is not registered
                    $err_msg = "Error registering user".mysqli_error($dbc);
                }
            }
                
        }else{
            // set error message - if there is an empty field
            $err_msg = "All fields are required";
        }


    }


?>

<form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-top:50px">
    <header class="form__header">
        <h1 class="form__title"><span>Register</span> your account</h1>
    </header>
      <?php
        // display error message
        if(!empty($err_msg)){ 
            echo '<p style="color:red; font-size:16px; margin-top:30px; margin-left:50px">'.$err_msg.'</p>';
        }
      ?>
      <?php
      // display success message 
      if (!empty($message)) echo '<p style="color:green; font-size:16px; margin-top:30px; margin-left:50px">'.$message.'</p>';
      ?>
    <fieldset class="form__body">
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Username</label>
                <input type="text" name="username" class="form__field" value="<?php echo $username; ?>" />
                <?php if (!empty($username_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $username_err; ?></span>
                <?php endif ?>
            </div>
            <div class="form__item">
                <label class="form__label">Password</label>
                <input type="password" name="password" class="form__field" value="<?php echo $password; ?>" />
                <?php if (!empty($password_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $password_err; ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Confirm Password</label>
                <input type="password" name="confirm-password" class="form__field" value="<?php echo $confirm_password; ?>" />
                <?php if (!empty($confirm_password_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $confirm_password_err; ?></span>
                <?php endif ?>
            </div>
            <div class="form__item">
                <label class="form__label">First name</label>
                <input type="text" name="first-name" class="form__field" value="<?php echo $first_name; ?>" />
                <?php if (!empty($first_name_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $first_name_err; ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Last name</label>
                <input type="text" name="last-name" class="form__field" value="<?php echo $last_name; ?>" />
                <?php if (!empty($last_name_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $last_name_err; ?></span>
                <?php endif ?>
            </div>
            <div class="form__item">
                <label class="form__label">Email</label>
                <input type="text" name="email" class="form__field" value="<?php echo $email; ?>" />
                <?php if (!empty($email_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $email_err; ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Date of birth:</label>
                <input type="date" name="dob" class="form__field form__field_calendar " value="<?php echo $dob; ?>" />
                <?php if (!empty($dob_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $dob_err; ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form__row">
            <button type="submit" name="register" class="btn btn_form">Register</button>
        </div>
    </fieldset>
</form>

<?php require('footer.php'); ?>
