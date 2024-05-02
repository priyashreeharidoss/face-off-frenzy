<?php
$db_conn       = NULL;
$db_servername = "localhost";
$db_username   = "root";
$db_password   = "";
$db_name       = "faceoff";
$host          = "localhost";

// Include config file
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

$db_conn = get_db_connection();

// Attempt select query execution
$sql = "SELECT question, option1, option2, option3, option4, correct FROM round3_question";
$result = mysqli_query($db_conn, $sql);

$questions = array(); // Initialize an empty array to hold the questions

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = array(
            'question' => $row['question'],
            'options' => array($row['option1'], $row['option2'], $row['option3'], $row['option4']),
            'answer' => $row['correct']
        ); // Add each question to the array
    }
} else {
    echo '<div class="alert alert-danger"><em>No questions were found.</em></div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_question.css">
    <title>Question and Answer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header{
            background-color: light-blue;

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
        .quiz-container {
            width: 800px;
            height: 500px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-image: url('bk1.jpg');
            background-size: cover;
        }
        h2 {
            margin-top: 140px;
            text-align: center;
            color: antiquewhite;
        }
        .options {
            margin-top: 20px;
            align-items: center;
        }
        .option-label1, .option-label2, .option-label3, .option-label4 {
            padding: 10px;
            background: #D9D9D9;
            border-radius: 12px;
            cursor: pointer;
        }
        .option-label1:hover, .option-label2:hover, .option-label3:hover, .option-label4:hover {
            background-color: aqua;
        }
        .option-label1.selected, .option-label2.selected, .option-label3.selected, .option-label4.selected {
            background-color: #28a745 !important; /* Change background color to green when selected */
        }
        .next button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .next button:hover {
            background-color: #0056b3;
        }

        .row {
            display: flex; /* Use flexbox to align items horizontally */
            justify-content: space-around; /* Adjust spacing between options */
            align-items: center; /* Align items vertically */
        }
    </style>
</head>
<body>
<form id="quiz-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="login-details">
        <?php
        // Retrieve login details from URL parameters
        $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : "";
        $loginid = isset($_GET['loginid']) ? htmlspecialchars($_GET['loginid']) : "";

        // Display login details
        echo "<br><br><br><p>Welcome, $username (ID: $loginid)</p>";
        ?>
        <div class="submit-btn">
            <button type="submit" name="submit" id="submit">Submit</button>
        </div>
    </div>

    <img src="user_clipart.png" alt="User Clipart" class="user-logo">
    <center>
        <div class="header"><h1>Round1<h1></div>
    </center>
    <div class="quiz-container">
        <h2 id="question">Question 1</h2>
        <br>
        <div class="opt-container">
            <div class="options">
                <div class="row">
                    <label for="option1" class="option-label1" id="label1" onclick="selectOption(this)">Option 1</label>
                    <label for="option2" class="option-label2" id="label2" onclick="selectOption(this)">Option 2</label>
                </div>
                <br><br>
                <div class="row">
                    <label for="option3" class="option-label3" id="label3" onclick="selectOption(this)">Option 3</label>
                    <label for="option4" class="option-label4" id="label4" onclick="selectOption(this)">Option 4</label>
                </div>
            </div>
            <center>
                <div class="next">
                    <button onclick="nextQuestion()">Next</button>
                </div>
            <center>
        </div>
    </div>
</form>


<script>
    var questions = <?php echo json_encode($questions); ?>;

    var currentQuestionIndex = 0;
    var questionElement = document.getElementById("question");
    var optionLabels = document.querySelectorAll('.options .row label');
    var marks = 0;
    var submitButton = document.querySelector('.submit-btn button');

    function loadQuestion() {
        var currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;
        for (var i = 0; i < currentQuestion.options.length; i++) {
            optionLabels[i].textContent = currentQuestion.options[i];
        }
        submitButton.style.backgroundColor = ''; // Reset button color
    }

    function selectOption(label) {
        var allLabels = document.querySelectorAll('.options .row label');
        allLabels.forEach(function(item) {
            item.classList.remove('selected');
        });
        label.classList.add('selected');
        submitButton.classList.remove('submitted'); // Remove submitted class
        submitButton.style.backgroundColor = '#28a745'; // Change button color to green
    }

    function nextQuestion() {
        var selectedOption = document.querySelector('.options .row label.selected');
        if (!selectedOption) {
            alert("Please select an option.");
            return;
        }

        var userAnswer = selectedOption.textContent.trim();
        var correctAnswer = questions[currentQuestionIndex].answer.trim();

        if (userAnswer === correctAnswer) {
            marks++;
        } else {
            marks=marks;
        }

        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            loadQuestion();
        } else {
            alert("Submit Answers. This is the last question!! " + marks);
        }
        var allLabels = document.querySelectorAll('.options .row label');
        allLabels.forEach(function(item) {
            item.style.backgroundColor = ''; // Reset background color of all option buttons
        });
        submitButton.style.backgroundColor = ''; // Reset button color
    }

    loadQuestion();

    document.getElementById("quiz-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting
    });
    document.querySelector('.submit-btn button').addEventListener('click', function() {
    // Redirect to success.php with marks detail and login details
    var username = '<?php echo isset($_GET["username"]) ? htmlspecialchars($_GET["username"]) : ""; ?>';
    var loginid = '<?php echo isset($_GET["loginid"]) ? htmlspecialchars($_GET["loginid"]) : ""; ?>';
    //var marks = <?php echo isset($marks) ? $marks : 0; ?>; // Assuming $marks is already defined
    
    var url = "success3.php?username=" + encodeURIComponent(username) + "&loginid=" + encodeURIComponent(loginid) + "&marks=" + marks;
    window.location.href = url;
});

</script>


</body>
</html>
