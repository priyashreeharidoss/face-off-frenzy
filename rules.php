<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Rules</title>
  <style>
    body {
  margin: 0;
  overflow: hidden;  /* Prevent body scrolling */
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

.background-video-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;  /* Clip video within container */
}

#background-video {
  width: 100%;
  height: 100%;
  object-fit: cover;  /* Scale video to fill container */
}

.content-wrapper {
  position: relative;
  color: white;  /* Text color for visibility on video */
  padding: 20px;
}

h1 {
  text-align: center;
  font-size: 2em;
}
h3 {
  text-align: center;
  font-size: 20px;
}
p {
  line-height: 1.5;
}

.title-highlight {
    color: #fff; /* Highlight color */
    animation: text-glow 2s ease-in-out infinite alternate;
}

@keyframes text-glow {
    from {
        text-shadow: 0 0 7px #fff;
    }
    to {
        text-shadow: 0 0 15px #fff;
    }
}
.rules-container {
  margin-top:50px;
  border: 1px solid #ddd;
  padding:50px;
  border-radius: 20px;
  background-color: rgba(0, 0, 0, 0.7);  /* Semi-transparent background */
  width:400px;
  
  height:300px;
  margin:auto;
}

h2 {
  margin-top:2px;
  margin-bottom: 5px;
}

.animated-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.animated-list li {
  animation-delay: 0.5s;
  animation-duration: 1s;
}

.animated-list li:nth-child(1) {
  animation-name: fadeIn;
}

.animated-list li:nth-child(2) {
  animation-name: slideInRight;
}

.animated-list li:nth-child(3) {
  animation-name: bounceIn;
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes slideInRight {
  from {transform: translateX(100px);}
  to {transform: translateX(0);}
}

@keyframes bounceIn {
  0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
  40% { transform: translateY(-30px); }
  60% { transform: translateY(-10px); }
}

.play-button {
  
  margin-top: 40px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #fff;
}
    </style>
</head>
<body>

  <div class="background-video-wrapper">
    <video id="background-video" autoplay loop muted poster="poster.jpg">
      <source src="hom1.webm" type="video/mp4">
    </video>
  </div>
<br><br><br><br>

  <div class="content-wrapper">
    <h1>Game Rules</h1>
    <h3><center><span class="title-highlight">Compete against a shuffled computer opponent, progress through rounds, and aim for victory with high points at " FACE OFF FRENZY"</center></span></h3>
    <div class="rules-container">
      <h2>Guidelines</h2>
      <ul class="animated-list">
        <li>(i) Participants must register to play the game.</li>
        <li>(ii) The game consists of 4 rounds. Players must complete the requirements of each round to proress to the next level.</li>
        <li>(iii) Team size : Individual. </li>
      </ul>
      <br><br>
      <h2>General Rules</h2>
      <ul class="animated-list">
        <li>(i) Each round has a designated time limit for completion.</li>
        <li>(ii) Players must submit their answers within the given timeframe. Note : There will be only the "NEXT" button in the panel, players cannot come back to the previous or mark for review as the game is efficient and faster. </li>
        <li>(iii) Participants are not allowed to seek help or use external resources while playing the game.</li>
      </ul>
     </div>
<center>

    <button type="button" class="play-button"><a href="rounds_home.php?username=<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>&loginid=<?php echo isset($_GET['loginid']) ? htmlspecialchars($_GET['loginid']) : ''; ?>">Let's Play!</a></button>

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

</body>
</html>
