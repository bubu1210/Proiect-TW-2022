<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  //Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter a email.";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      // Set parameters
      $param_email = trim($_POST["email"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }


  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  // Check input errors before inserting in database
  if (empty($username_err) && empty($email_err) &&  empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

      // Set parameters
      $param_username = $username;
      $param_email = $email;
      $param_password = $password;

      // Creates a password hash for better security
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: loginBE.php");
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
  <link rel="stylesheet" href="../pages/SignUp/signup.css">

  <title>Sign Up</title>
</head>

<body>
  <div class="background">
    <div class="<?php if (empty($username_err) || empty($email_err) || empty($password_err) || empty($confirm_password_err)) {
                  echo "signup-wrapper";
                } else {
                  echo "php-no-width-limit";
                } ?>">
      <h1>Sign Up</h1>
      <form class="custom-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Username</label>
        <div class="<?php if (empty($username_err)) {
                      echo "icon-input username-input";
                    } else {
                      echo "icon-input username-input .php";
                    } ?>">
          <input type="text" id="username" name="username" placeholder="Type in your username" value="<?php echo $username; ?>">
        </div>
        <span class="<?php if (!empty($username_err)) {
                        echo "php-response";
                      } ?>"> <?php echo $username_err; ?></span>

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
        <p>Already have an account?</p>
        <a href="loginBE.php">LOGIN</a>


      </div>
    </div>
  </div>
</body>

</html>