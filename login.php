<?php 
require('header.php'); 
// set error to false
$error = false;
//set messages to empty
$err_msg = "";
// set username and password errors to empty
$username_err = $password_err = "";
// set username and password variables to empty
$username = $password = "";

// if user clicks the login button
if (isset($_POST['login'])) {

    // sanitize the POST variable
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // set varibles to user input from POST array
    $username = strtolower(trim($_POST['username']));
    $password = strtolower(trim($_POST['password']));

    // validate input
    if (empty($username)) {
        $error = true;
        $username = "Username is empty";
    }

    if (empty($password)) {
        $error = true;
        $password_err = "Password is empty";
    }
    // end validate input

    if (!$error) {
        $password = md5($password);
        // check user query
        $check_user = mysqli_query($dbc, "SELECT user_id FROM users WHERE username='$username' AND status=0");

        // check id user  exist
        if (mysqli_num_rows($check_user) > 0) {
            $query = "SELECT user_id FROM users WHERE username='$username' AND password='$password'";
            if (mysqli_query($dbc, $query)) {
                $_SESSION['is_logged'] = true;
                $_SESSION['username'] = $username;
                // redirect to homepage
                header("location: index.php");
            }else{
                $password_err = "Invalid password".mysqli_error();
            }
        }else{
            // user does not exist
            $username_err = "Username does not exist";
        }

    }else{
        $err_msg = "All fields are required";
    }
    
}

?>

<form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <header class="form__header">
        <h1 class="form__title"><span>Login</span> to your account</h1>
    </header>
    <?php
        // display error message
        if(!empty($err_msg)){ 
            echo '<p style="color:red; font-size:16px; margin-top:30px; margin-left:50px">'.$err_msg.'</p>';
        }
    ?>
    <fieldset class="form__body">
        <div class="form__row">
            <div class="form__item">
                <label class="form__label">Username or email</label>
                <input type="text" name="username" class="form__field" value="<?php echo $username; ?>" />
                <?php if (!empty($username_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $username_err; ?></span>
                <?php endif ?>
            </div>
            <div class="form__item">
                <label class="form__label">Password</label>
                <input type="password" name="password" class="form__field" value="" />
                <?php if (!empty($password_err)): ?>
                    <span style="font-size: inherit; color: red"><?php echo $password_err; ?></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form__row">
          <input type="checkbox" name="remember" value="Remember me" class="form__field" />
        </div>
        <div class="form__row">
            <button type="submit" name="login" class="btn btn_form">Login</button>
        </div>
    </fieldset>
</form>

<?php require('footer.php'); ?>
