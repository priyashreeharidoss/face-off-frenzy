<?php
// Initialize variables
$username = "";
$loginid = "";

// Retrieve login details from URL parameters if they exist
if (isset($_GET['username'])) {
    $username = htmlspecialchars($_GET['username']);
}
if (isset($_GET['loginid'])) {
    $loginid = htmlspecialchars($_GET['loginid']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Event Home</title>
    <style>
        .video-container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden; /* Ensure video fills entire viewport */
}
.login-details {
            position: absolute;
            top: 10px;
            right: 10px; /* Adjust right positioning as needed */
            color: #000; /* Adjust the color as needed */
            font-size: 16px; /* Adjust the font size as needed */
        }
        .user-logo {
            position: absolute;
            top: 10px;
            right: 60px; /* Adjust right positioning as needed */
            width: 80px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }

#background-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.title {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    font-size: 36px;
    text-align: center;
    z-index: 1;
}

.logo {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1;
}

.event-cards-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 2; /* Ensure event cards are above the video */
}

.event-cards {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 80%;
    max-width: 1200px; /* Adjust as needed */
}

.event-card {
    flex: 1;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s, transform 0.3s;
    text-align: center;
    margin: 10px;
    max-width: 250px;
    height: 200px;
    /* Add gradient background */
    background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.5)); /* Adjust opacity as needed */
}

.event-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

.event-card.dim {
    opacity: 0.5;
    pointer-events: none;
}

        </style>
</head>
<body>
    <!-- Background Video -->
    <div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="bg_video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <h1 class="title">FACE OFF FRENZY</h1>
        <img src="logo_home.png" alt="Logo" class="logo">
    </div>

    <div class="event-cards-container">
        <div class="event-cards">
            <div class="event-card" onclick="highlightEvent(this)">
                <h2>Round 1</h2>
                <p>Know your domain</p>
                <img id="Round1" src="round 1.png" onclick="openAnotherPage('round1.php','<?php echo $username; ?>', '<?php echo $loginid; ?>')">
            </div>
            <div class="event-card" onclick="highlightEvent(this)">
                <h2>Round 2</h2>
                <p>Tech Fest</p>
                <img id="Round2" src="round 2.png" onclick="openAnotherPage('round2.php','<?php echo $username; ?>', '<?php echo $loginid; ?>')">
            </div>
            <div class="event-card" onclick="highlightEvent(this)">
                <h2>Round 3</h2>
                <p>Current Trendz</p>
                <img id="Round3" src="round 3.png" onclick="openAnotherPage('round3.php','<?php echo $username; ?>', '<?php echo $loginid; ?>')">
            </div>
            <div class="event-card" onclick="highlightEvent(this)">
                <h2>Round 4</h2>
                <p>Knowledge Knockout</p>
                <img id="Round4" src="round 4.png" onclick="openAnotherPage('round4.php','<?php echo $username; ?>', '<?php echo $loginid; ?>')">
            </div>>
        </div>
    </div>
<div class="login-details">
        <?php
        // Retrieve login details from URL parameters
        $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : "";
        $loginid = isset($_GET['loginid']) ? htmlspecialchars($_GET['loginid']) : "";

        // Display login details
        echo "<br><br><br><p>Welcome, $username (ID: $loginid)</p>";
        ?>
        <img src="user_clipart.png" alt="User Clipart" class="user-logo">

    <script>
        function highlightEvent(clickedCard) {
            var eventCards = document.querySelectorAll('.event-card');
            eventCards.forEach(function(card) {
                if (card !== clickedCard) {
                    card.classList.add('dim'); // Dim all cards except the clicked one
                }
            });
        }
        function openAnotherPage(url, username, loginid) {
    // Construct the URL with query parameters
    var redirectUrl = url + '?username=' + username + '&loginid=' + loginid;

    // Debugging: Alert the constructed URL
    //alert("Redirecting to: " + redirectUrl);

    // Redirect to the specified URL
    window.location.href = redirectUrl;
}


    </script>
</body>
</html>
