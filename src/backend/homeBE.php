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





// // Prepare a select statement
// $sql = "SELECT username FROM users WHERE email = ?";

// if ($stmt = mysqli_prepare($con, $sql)) {
//   // Bind variables to the prepared statement as parameters
//   mysqli_stmt_bind_param($stmt, "s", $param_email);

//   // Set parameters
//   $param_email = trim($_SESSION["email"]);

//   if (mysqli_stmt_execute($stmt)) {
//     /* store result */
//     mysqli_stmt_store_result($stmt);

//     // mysqli_stmt_bind_result($stmt, $param_email);

//     $username = mysqli_stmt_get_result($stmt);
//   }

// $sql = "SELECT username FROM users WHERE email = `$email";
// $result = mysqli_query($con, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while ($row = mysqli_fetch_assoc($result)) {
//     $_SESSION["username"] = $row["username"];
//   }
// } else {
//   echo "0 results";
// }


//   if (mysqli_stmt_num_rows($stmt) == 1) {
//     $username_err = "This username is already taken.";
//   } else {
//     $username = trim($_POST["username"]);
//   }
// } else {
//   echo "Oops! Something went wrong. Please try again later.";
// }






// $result = mysqli_stmt_get_result($stmt);

// // Set parameters
// $param_email = trim($_SESSION["email"]);

// // Attempt to execute the prepared statement
// if (mysqli_stmt_execute($stmt)) {
//   /* store result */
//   mysqli_stmt_store_result($stmt);



//   // /* fetch values */
//   // while (mysqli_stmt_fetch($stmt)) {
//   //   $_SESSION["username"] = $param_email;
//   // }

//   $username = mysqli_stmt_get_result($stmt);

//   /* close statement */
//   mysqli_stmt_close($stmt);

//   //   if (mysqli_stmt_num_rows($stmt) == 1) {
//   //     $username = trim($_SESSION["username"]);
//   //   } else {
//   //     $username_err = "This username has more than two accounts asscociated";
//   //   }
//   // } else {
//   //   echo "Oops! Something went wrong. Please try again later.";
//   // }
// }


?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../public/assets/favicons/favicon3.ico">

  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../pages/Home/home.css">

  <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&family=Updock&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">

  <script src="../js/templates2.js" type="text/javascript"></script>

  <script>
    var username = '<?=htmlspecialchars($_SESSION["username"])?>';
  </script>


  <title>Home</title>
</head>

<body class="main-layout">
  <!-- NAV MENU -->
  <main-header></main-header>

  <!-- HOME CONTENT -->
  <div class="main">

    <!-- Recent autographs -->
    <div class="autographsClass ">


      <h1> Most recent autographs </h1>
      <div class="slideshow-container 1">


        <div class="mySlides fade">
          <div class="userName">
            <p> @User1 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-1-5b212298b9a4e__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              01.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User2 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-10-5b22506659ed9__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              02.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User3 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-103-5b2cf89588a93__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              03.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User4 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-104-5b2cfd169c77f__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              04.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User5 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-13-5b225be8cf411__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              05.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User6 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-15-5b2262f2a016a__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              06.04.2022
            </p>
          </div>
        </div>

        <button class="prev"><img src="../../public/assets/icons/navigate_before_black_36dp.svg" alt="Arrow forward"></button>
        <button class="next"><img src="../../public/assets/icons/navigate_next_black_36dp.svg" alt="Arrow forward"></button>

      </div>


      <div class="link-category">
        <a href="./allAutopgraphsBE.php"> See all </a>
      </div>

    </div>

    <!-- Music autographs -->
    <div class="autographsClass">


      <h1> Music autographs </h1>
      <div class="slideshow-container 2">


        <div class="mySlides fade">
          <div class="userName">
            <p> @User1 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-16-5b226623c245e__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              01.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User2 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-17-5b2268cb27a56__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              02.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User3 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-21-5b227319baf8f__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              03.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User4 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-25-5b227c096d755__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              04.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User5 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-27-5b227f0091793__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              05.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User6 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-30-5b2775e57047f__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              06.04.2022
            </p>
          </div>
        </div>

        <button class="prev"><img src="../../public/assets/icons/navigate_before_black_36dp.svg" alt="Arrow forward"></button>
        <button class="next"><img src="../../public/assets/icons/navigate_next_black_36dp.svg" alt="Arrow forward"></button>

      </div>


      <div class="link-category">
        <a href="./allAutopgraphsBE.php"> See all </a>
      </div>

    </div>

    <!-- Movie autographs -->
    <div class="autographsClass">


      <h1> Movie autographs </h1>
      <div class="slideshow-container 3">


        <div class="mySlides fade">
          <div class="userName">
            <p> @User1 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-32-5b2779fb4ba18__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              01.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User2 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-34-5b277fd141a9f__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              02.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User3 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-39-5b27a1d14383a__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              03.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User4 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-50-5b28ceea3ecbf__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              04.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User5 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-51-5b28d11130209__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              05.04.2022
            </p>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="userName">
            <p> @User6 </p>
          </div>
          <img src="../../public/assets/autographs and names/celebrity-autographs-73-5b2a4b2a1b074__700.jpg" style="width:100%">
          <div class="autographDate">
            <p>
              06.04.2022
            </p>
          </div>
        </div>

        <button class="prev"><img src="../../public/assets/icons/navigate_before_black_36dp.svg" alt="Arrow forward"></button>
        <button class="next"><img src="../../public/assets/icons/navigate_next_black_36dp.svg" alt="Arrow forward"></button>

      </div>


      <div class="link-category">
        <a href="./allAutopgraphsBE.php"> See all </a>
      </div>

    </div>
    <br>




  </div>

  <!-- Footer -->
  <main-footer></main-footer>

  <!-- SCRIPTS -->
  <script src="../js/menu.js" type="text/javascript"></script>
  <script src="../js/slideshow.js" type="text/javascript"></script>
</body>

</html>