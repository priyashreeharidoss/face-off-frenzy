<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Introduction Page</title>
    <style>
        @import "https://unpkg.com/open-props";

        * {
          box-sizing: border-box;
        }
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
            margin: 0; /* Remove default margin */
           

        }
        .login-details {
            position: absolute;
            top: 10px;
            right: 10px; /* Adjust right positioning as needed */
            color: #ffffff; /* Adjust the color as needed */
            font-size: 16px; /* Adjust the font size as needed */
        }
        .user-logo {
            position: absolute;
            top: 10px;
            right: 60px; /* Adjust right positioning as needed */
            width: 80px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        .container {
            text-align: center;
            color: #fff;
            position: relative;
            
        }
        .background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }

        .logo {
            width: 200px; /* Adjust logo size */
        }

        .title {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        @keyframes text-glow {
            from {
                text-shadow: 0 0 7px #fff;
            }
            to {
                text-shadow: 0 0 15px #fff;
            }
        }

        .description {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .explore-btn-container {
            text-align: center;
            margin-right: 20px;
        }

        .explore-btn {
            background-color: #00f; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            margin:auto;
        }
        .explore-btn a{
            text-decoration: none;
        }

        .explore-btn:hover {
            transform: scale(1.3); 
        }

        .container:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            animation: reveal-content 2s ease-in-out forwards;
        }

        @keyframes reveal-content {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .title-highlight {
            color: #00f; /* Highlight color */
            animation: text-glow 2s ease-in-out infinite alternate;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <video autoplay muted loop class="background-video">
            <source src="hom3.webm" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <img src="logo.png" alt="Logo" class="logo">
        <h1 class="title">Welcome to <span class="title-highlight">The QUIZIVERSE</span></h1>
        <p class="description">Experience an ultimate and challenging quiz.</p>

        

        </div> 
    
    <div class="explore-btn-container">
        <center>
        <button class="explore-btn">Explore Now</button>
    </center>
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
    </div>
    


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const exploreButton = document.querySelector('.explore-btn');

            exploreButton.addEventListener('click', function() {
                // Retrieve login details
                const username = "<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>";
                const loginid = "<?php echo isset($_GET['loginid']) ? htmlspecialchars($_GET['loginid']) : ''; ?>";

                // Redirect to rules.php with login details
                window.location.href = `rules.php?username=${username}&loginid=${loginid}`;
            });
        });
    </script>
</body>
</html>
