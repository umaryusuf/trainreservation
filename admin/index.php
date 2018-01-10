<?php
require_once('../config/db.php');

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
        $check_user = mysqli_query($dbc, "SELECT user_id FROM users WHERE username='$username' AND status=1");

        // check id user  exist
        if (mysqli_num_rows($check_user) > 0) {
            $query = "SELECT user_id FROM users WHERE username='$username' AND password='$password'";
            if (mysqli_query($dbc, $query)) {
                $_SESSION['is_logged'] = true;
                $_SESSION['username'] = $username;
                // redirect to homepage
                header("location: dashboard.php");
            }else{
                $password_err = "Invalid password";
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Your Train Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">	
                        <form role="form" method="post" action="index.php">
                            <fieldset>
                                <div class="form-group">
                                	<label for="username">Username:</label>
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $username ?>" autofocus>
                                    <?php if (!empty($username_err)): ?>
					                    <span style="font-size: inherit; color: red"><?php echo $username_err; ?></span>
					                <?php endif ?>
                                </div>
                                <div class="form-group">
                                	<label for="password">Password:</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" >
                                    <?php if (!empty($password_err)): ?>
					                    <span style="font-size: inherit; color: red"><?php echo $password_err; ?></span>
					                <?php endif ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-block btn-success" name="login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>
</html>
