<?php
$db_conn       = NULL;
$db_servername = "localhost";
$db_username   = "root";
$db_password   = "";
$db_name       = "faceoff";
$host          = "localhost";

// Include config file
function get_db_connection() {
    global $db_conn, $db_servername, $db_username, $db_password, $db_name;

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

$db_conn = get_db_connection();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Retrieve username, loginid, and marks from form submission
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : "";
    $loginid = isset($_POST['loginid']) ? htmlspecialchars($_POST['loginid']) : "";
    $marks = isset($_POST['marks']) ? intval($_POST['marks']) : 0;

    // Prepare and bind SQL statement to prevent SQL injection
    $sql = "INSERT INTO round2 (username, loginid, mark1) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db_conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $username, $loginid, $marks);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $flag = 1;
    } else {
        $flag = 2;
    }
    mysqli_stmt_close($stmt);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .login-details {
            position: absolute;
            top: 10px;
            right: 10px; /* Adjust right positioning as needed */
            color: #000; /* Adjust the color as needed */
            font-size: 16px; /* Adjust the font size as needed */
        }
        .submit-btn {
    text-align: center;
    margin-top: 20px;
}
.submit-btn button {
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.submit-btn button:hover {
    background-color: #218838;
}
        .user-logo {
            position: absolute;
            top: 10px;
            right: 60px; /* Adjust right positioning as needed */
            width: 80px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        .success-message {
            margin-top: 100px;
            font-size: 24px;
            color: #28a745;
        }
        .redirect-info {
            margin-top: 20px;
            font-size: 18px;
        }
        .redirect-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="login-details">
            <?php
            // Display login details if available
            if (isset($_GET['username']) && isset($_GET['loginid'])) {
                $username = htmlspecialchars($_GET['username']);
                $loginid = htmlspecialchars($_GET['loginid']);
                echo "<br><br><br><p>Welcome, $username (ID: $loginid)</p>";
            }
            ?>
            <img src="user_clipart.png" alt="User Clipart" class="user-logo">
        </div>
        <div class="success-message">Confirm and Submit Your Answers </div>
        <input type="hidden" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
        <input type="hidden" name="loginid" value="<?php echo isset($loginid) ? $loginid : ''; ?>">
        <input type="hidden" name="marks" value="<?php echo isset($_GET['marks']) ? intval($_GET['marks']) : 0; ?>">
        <div class="submit-btn">
            <button type="submit" name="submit" id="submit"> Confirm and Submit</button>
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($flag === 1) {
            echo "<p style='color:green;'>Registration successful! Click here to go back to the home page</p>";
            exit(); // Exit to prevent further execution
        } elseif ($flag === 2) {
            echo "<p style='color:red;'>Registration failed. Please try again.</p>";
        }
    }
    ?>
    <div class="redirect-info">You will be redirected to the home page shortly...</div>
    <script>
        // Redirect to home page after 5 seconds
        setTimeout(function() {
            window.location.href = 'login.php'; // Replace 'login.php' with the actual home page URL
        }, 5000); // Redirect after 5 seconds (5000 milliseconds)
    </script>
</body>
</html>
