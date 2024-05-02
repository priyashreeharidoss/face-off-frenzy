<?php
$db_conn       = NULL;
$db_servername = "localhost";
$db_username   = "root";
$db_password   = "";
$db_name       = "faceoff";

function get_db_connection() {
    global $db_conn;
    global $db_servername;
    global $db_username;
    global $db_password;
    global $db_name;

    if ($db_conn != NULL) {
        return $db_conn;
    } else {
        $db_conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        if (!$db_conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $db_conn;
        }
    }
}

$flag = 0;
// Define variables and initialize with empty values
$username = $loginid = "";
$username_err = $loginid_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Username
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Please enter a username.";
    } else {
        $username = $input_username;
    }

    // Validate Login ID
    $input_loginid = trim($_POST["loginid"]);
    if (empty($input_loginid)) {
        $loginid_err = "Please enter a valid login ID.";
    } else {
        $loginid = $input_loginid;
    }

    $db_conn = get_db_connection();

    // Check if both username and login ID are provided
    if (!empty($username) && !empty($loginid)) {
        // Redirect to question.php with login details as URL parameters
        header("Location: main_home.php?username=" . urlencode($username) . "&loginid=" . urlencode($loginid));
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.8.3/anime.min.js"></script>
</head>
<body>
   <video autoplay muted loop id="background-video"> <source src="background.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
    <div class="man1">
                   <img src="user1.svg" alt="Login User" class="animated-user">
          </div>
           <div class="man2">
                   <img src="user2.svg" alt="Login User" class="animated-user">
          </div>
     <div class="container">
        <h1 class= "title">Unlock the Quiz Vault</h1>
        <form  method="post" class="login-form">
            <div class="input-container">
                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
                <span class="error"><?php echo $username_err; ?></span>
            </div>
            <div class="input-container">
                <label for="loginid"></label>
                <input type="text" id="loginid" name="loginid" placeholder="Login ID" value="<?php echo htmlspecialchars($loginid); ?>">
                <span class="error"><?php echo $loginid_err; ?></span>
            </div>
            <button type="submit" name="submit" id="submit" class="login-btn">Log In</button>
        </form>
    </div>
    <script src="login_script.js"></script>
</body>
</html>
