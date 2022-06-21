<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: loginBE.php");
  exit;
}

$username = "";
$username_err = "";
$email = $_SESSION["email"];

$sql = "SELECT username FROM users WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
  foreach ($row as $r) {
    $_SESSION["username"] = $r;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../public/assets/favicons/favicon3.ico">

  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../pages/AllAutographs/all-autographs.css">

  <script src="../js/templates2.js" type="text/javascript"></script>
  <script>
    var username = '<?=htmlspecialchars($_SESSION["username"])?>';
  </script>


  <title>All autographs</title>
</head>

<body>
  <!-- NAV MENU -->
  <main-header>
  </main-header>

  <!-- AUTOGRAPH CONTAINER -->
  <div class="main">
    <h1> Most recent autographs </h1>
    <div class="autograph-card">
      <div class="autograph-card__header">
        <h2>@User_name</h2>
        <time datetime="2022-04-09">01.0.1.2022</time>
      </div>

      <div class="autograph-card__body">
        <div class="autograph-image-wrapper">

          <!-- <img class="celebrity-avatar" src="../../../public/assets/avatar-default.svg" alt="Avatar for the celebrity" >
          <img class="autograph-image" src="../../../public/assets/image-default.svg" alt="Image of the autograph" width="300" height="300" > -->

          <img class="celebrity-avatar" src="../../public/assets/celebrities/celebrity-autographs-33-5b277be0e7b82__700.png" alt="Avatar for the celebrity">
          <img class="autograph-image" src="../../public/assets/autographs/celebrity-autographs-33-5b277be0e7b82__700.jpg" alt="Image of the autograph">


        </div>

        <div class="autograph-details">
          <div class="info-group">
            <label for="celebrity-name">From:</label>
            <span id="celebrity-name">Elvis Presley</span>
          </div>

          <div class="info-group">
            <label for="domain">Domain:</label>
            <span id="domain">Music</span>
          </div>

          <div class="info-group">
            <label for="context">Context:</label>
            <span id="context">Concert</span>
          </div>

          <div class="info-group">
            <label for="country">Country:</label>
            <span id="country">England</span>
          </div>

          <div class="info-group">
            <label for="give-on">Given on:</label>
            <span id="given-on">Paper</span>
          </div>

          <div class="info-group">
            <label for="value">Value:</label>
            <span id="value">79.99$</span>
          </div>

          <div class="info-group--wide">
            <label for="special-mentions">Special mentions:</label>
            <textarea id="special-mentions" readonly>Don't keep in humidity</textarea>
          </div>

          <div class="info-group--wide">
            <label for="exchange">Exchanging with autographs from:</label>
            <ul id="exchange">
              <li>
                <span>Cristiano Ronaldo</span>
              </li>
            </ul>
          </div>


        </div>

        <div class="info-group--wide">
          <ul class="tag-list">
            <li class="tag">
              <span>Music</span>
            </li>
            <li class="tag">
              <span>Football</span>
            </li>
            <li class="tag">
              <span>Paper</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="autograph-card">
      <div class="autograph-card__header">
        <h2>@crazy_partier</h2>
        <time datetime="2022-04-09">01.0.1.2022</time>
      </div>

      <div class="autograph-card__body">
        <div class="autograph-image-wrapper">

          <!-- <img class="celebrity-avatar" src="../../../public/assets/avatar-default.svg" alt="Avatar for the celebrity" >
          <img class="autograph-image" src="../../../public/assets/image-default.svg" alt="Image of the autograph" width="300" height="300" > -->

          <img class="celebrity-avatar" src="../../public/assets/celebrities/celebrity-autographs-103-5b2cf89588a93__700.png" alt="Avatar for the celebrity">
          <img class="autograph-image" src="../../public/assets/autographs/celebrity-autographs-103-5b2cf89588a93__700.jpg" alt="Image of the autograph">


        </div>

        <div class="autograph-details">
          <div class="info-group">
            <label for="celebrity-name">From:</label>
            <span id="celebrity-name">Elvis Presley</span>
          </div>

          <div class="info-group">
            <label for="domain">Domain:</label>
            <span id="domain">Music</span>
          </div>

          <div class="info-group">
            <label for="context">Context:</label>
            <span id="context">Concert</span>
          </div>

          <div class="info-group">
            <label for="country">Country:</label>
            <span id="country">England</span>
          </div>

          <div class="info-group">
            <label for="give-on">Given on:</label>
            <span id="given-on">Paper</span>
          </div>

          <div class="info-group">
            <label for="value">Value:</label>
            <span id="value">79.99$</span>
          </div>

          <div class="info-group--wide">
            <label for="special-mentions">Special mentions:</label>
            <textarea id="special-mentions" readonly>Don't keep in humidity</textarea>
          </div>

          <div class="info-group--wide">
            <label for="exchange">Exchanging with autographs from:</label>
            <ul id="exchange">
              <li>
                <span>Cristiano Ronaldo</span>
              </li>
            </ul>
          </div>


        </div>

        <div class="info-group--wide">
          <ul class="tag-list">
            <li class="tag">
              <span>Music</span>
            </li>
            <li class="tag">
              <span>Football</span>
            </li>
            <li class="tag">
              <span>Paper</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="autograph-card">
      <div class="autograph-card__header">
        <h2>@crazy_partier</h2>
        <time datetime="2022-04-09">01.0.1.2022</time>
      </div>

      <div class="autograph-card__body">
        <div class="autograph-image-wrapper">

          <!-- <img class="celebrity-avatar" src="../../../public/assets/avatar-default.svg" alt="Avatar for the celebrity" >
          <img class="autograph-image" src="../../../public/assets/image-default.svg" alt="Image of the autograph" width="300" height="300" > -->

          <img class="celebrity-avatar" src="../../public/assets/celebrities/celebrity-autographs-10-5b22506659ed9__700.png" alt="Avatar for the celebrity">
          <img class="autograph-image" src="../../public/assets/autographs/celebrity-autographs-10-5b22506659ed9__700.jpg" alt="Image of the autograph">


        </div>

        <div class="autograph-details">
          <div class="info-group">
            <label for="celebrity-name">From:</label>
            <span id="celebrity-name">Elvis Presley</span>
          </div>

          <div class="info-group">
            <label for="domain">Domain:</label>
            <span id="domain">Music</span>
          </div>

          <div class="info-group">
            <label for="context">Context:</label>
            <span id="context">Concert</span>
          </div>

          <div class="info-group">
            <label for="country">Country:</label>
            <span id="country">England</span>
          </div>

          <div class="info-group">
            <label for="give-on">Given on:</label>
            <span id="given-on">Paper</span>
          </div>

          <div class="info-group">
            <label for="value">Value:</label>
            <span id="value">79.99$</span>
          </div>

          <div class="info-group--wide">
            <label for="special-mentions">Special mentions:</label>
            <textarea id="special-mentions" readonly>Don't keep in humidity</textarea>
          </div>

          <div class="info-group--wide">
            <label for="exchange">Exchanging with autographs from:</label>
            <ul id="exchange">
              <li>
                <span>Cristiano Ronaldo</span>
              </li>
            </ul>
          </div>


        </div>

        <div class="info-group--wide">
          <ul class="tag-list">
            <li class="tag">
              <span>Music</span>
            </li>
            <li class="tag">
              <span>Football</span>
            </li>
            <li class="tag">
              <span>Paper</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>



  <!-- PAGINATION -->
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a class="active" href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
  </div>


  <!-- FOOTER -->
  <main-footer>
  </main-footer>


  <!-- SCRIPTS -->
  
  <script src="../js/menu.js" type="text/javascript"></script>
  <script src="../js/slideshow.js" type="text/javascript"></script>


</body>

</html>