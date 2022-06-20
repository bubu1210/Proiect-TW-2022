<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

  // !!!!!!! DECOMENTEAZA !!!!!!!

  header("location: ./homeBE.php");
  exit;
}

// Include config file
require_once "./config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id, email, password FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      // Set parameters
      $param_email = $email;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $email;

              // Redirect user to welcome page
              header("location: homeBE.php");
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid username or password.";
        }
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
  <link rel="icon" type="image/x-icon" href="../../../public/assets/favicons/favicon3.ico">

  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../pages/Login/login.css">
  <link rel="stylesheet" href="../../public/assets/logo-small.png">

  <title>Login</title>
</head>

<body>
  <div class="background">
  <div class="<?php if (empty($email_err) || empty($password_err)) {
                  echo "login-wrapper";
                } else {
                  echo "php-no-width-limit";
                } ?>">
      <h1>Login</h1>
      <?php
      if (!empty($login_err)) {
        echo '<div class="php-response">' . $login_err . '</div>';
      }
      ?>

      <form class="custom-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email</label>
        <div class="icon-input email-input">
          <input type="email" id="email" name="email" placeholder="Type in your email">
        </div>
        <span class="<?php if (!empty($email_err)) {
                        echo "php-response";
                      } ?>"><?php echo $email_err; ?></span>

        <label for="password">Password</label>
        <div class="icon-input password-input">
          <input type="password" id="password" name="password" placeholder="Type in your password">
        </div>
        <span class="<?php if (!empty($password_err)) {
                        echo "php-response";
                      } ?>"><?php echo $password_err; ?></span>

        <a href="./forgotPasswordBE.php">Forgot password?</a>
        <button type="submit">LOGIN</button>
      </form>

      <div class="redirect-register">
        <p>Don't have an account?</p>
        <a href="../SignUp/signup.html">SIGN UP</a>
      </div>
    </div>
  </div>
</body>

</html>