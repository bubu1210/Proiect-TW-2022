<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
}
?>

<style>
    .php-response {
        color: red;
        margin-bottom: 10px;
        text-align: right;
    }

    .php-hidden-response {
        display: none;
    }

    .php-responsive {
        position: relative;
        margin-bottom: 5px;
    }

    .php-no-width-limit {
        box-sizing: border-box;
        border-radius: var(--border-radius);
        max-width: 375px;
        width: 375px;
        max-height: unset;
        height: auto;
        padding: 60px 30px;
        background-color: var(--white);
        margin-left: auto;
        margin-right: auto;
        box-shadow: var(--box-shadow);
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }

    .php-no-width-limit h1 {
        text-align: center;
        margin-bottom: 50px;
    }
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../public/assets/favicons/favicon3.ico">

    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../pages/ForgotPassword/forgotPassword.css">

    <title>Forgot Password</title>
</head>

<body>
    <div class="background">
        <div class="<?php if (empty($username_err) || empty($email_err) || empty($password_err) || empty($confirm_password_err)) {
                        echo "forgotPassword-wrapper";
                    } else {
                        echo "php-no-width-limit";
                    } ?>">
            <h1>Forgot password?</h1>
            <form class="custom-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label for="email">Email</label>
                <div class="icon-input email-input">
                    <input type="email" id="email" name="email" placeholder="Type in your email" value="<?php echo $email; ?>">
                </div>
                <span class="<?php if (!empty($email_err)) {
                                    echo "php-response";
                                } ?>"><?php echo $email_err; ?></span>

                <label for="password">Password</label>
                <div class="icon-input password-input">
                    <input type="password" id="password" name="password" placeholder="Type in your password" value="<?php echo $password; ?>">
                </div>
                <span class="<?php if (!empty($password_err)) {
                                    echo "php-response";
                                } ?>"><?php echo $password_err; ?></span>

                <label for="password">Confirm password</label>
                <div class="icon-input confirm-password-input">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-type your password" value="<?php echo $confirm_password; ?>">
                </div>
                <span class="<?php if (!empty($confirm_password_err)) {
                                    echo "php-response";
                                } ?>"><?php echo $confirm_password_err; ?></span>

                <button type="submit">SUBMIT</button>
            </form>

            <div class="redirect-register">
                <p>Did you remembered your old password?</p>
                <a href="../Login/login.html">LOGIN</a>
            </div>
        </div>
    </div>
</body>

</html>