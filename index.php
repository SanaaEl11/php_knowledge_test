<?php 
session_start();

// Check if the user is logged in, if not, redirect to signin page
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    header('Location: signin.php');
    exit();
}

// Display a welcome message using the session variable
$nickname = $_SESSION['nickname'] ?? 'Guest';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    <title>home</title>
</head><style>
    
    html {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    
    *,
    *:before,
    *::before,
    *:after,
    *::after {
      -webkit-box-sizing: inherit;
      -moz-box-sizing: inherit;
      box-sizing: inherit;
    }
    
    body {
      margin: 0;
    }
    
    [hidden] {
      display: none !important;
    }
    
    html,
    body,
    #root {
      height: 100%;
    }
    
    body {
      background: #e9f1f3;
      color: #0c0c0d;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 16px;
    }
    
    

    
    /* layout css */
    .container {
      max-width: 500px;
      margin: auto;
    }
    
    .wrapper {
      padding: 10px;
    }
    
    
    
    @media screen and (max-width: 480px) {
      .frm-group.inline {
        display: block;
      }
      .frm-group.inline .frm-group:not(:last-child) {
        margin: 0 0 15px;
      }
    }
    
</style>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light mb-0">
        <div class="container-fluid">
            <a style="text-decoration: none;color: #28537d;" class="navbar-brand" href="index.php">
                <span id="span1" style="color: #28537d;">PHP</span> <span id="span2">TEST</span>
            </a>
            <div class="collapse navbar-collapse mb-0">
                <ul class="navbar-nav me-auto  ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About us</a>
                    </li>
                </ul>
                <div class="d-flex">
                   <p>Welcome, <?php echo htmlspecialchars($nickname); ?>!</p>
                   <span>You are successfully logged in.</span>
                    <a href="createacount.php"style="color:white;text-decoration:none"><button class="btn btn-primary" id="b2">Create Account</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="center" >
        <div class="container text-center ">
            <h1>Unlock Your PHP Potential Today! <a href="#">Discover More</a></h1>
            <h2>Elevate Your Coding Skills with Our PHP Knowledge Test!</h2>
            <h3>Challenge yourself with our interactive quiz designed to assess your PHP expertise and boost your confidence.</h3>
            <div class="button-group mt-4">
                <button id="b4" class="btn btn-success" >Get Started Now!</button>
            </div>
        </div>
    </div>

    <div class="stepper-container my-5">
        <div class="stepper">
            <div class="step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-title">Information</div>
            </div>
            <div class="step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-title">QCM Test</div>
            </div>
            <div class="step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-title">Results</div>
            </div>
        </div>

        <div class="step-content"id="targetSection">
            <!-- Information Step -->
            <div class="step-panel active" data-step="1">
                <h2 >Information about PHP</h2>
                <div id="informationContent"></div>
                <button class="btn btn-primary next-info">Next</button>
            </div>

            <!-- QCM Test Step -->
            <div class="step-panel" data-step="2">
                <h2>PHP QCM Test</h2>
                <div id="timer">Time left: 30:00</div>
                <div id="questionContent"></div>
                <button class="btn btn-primary next-question">next</button>
            </div>


            <!-- Results Step -->
            <div class="step-panel" data-step="3">
                <h2>Your Results and Corrections</h2>
                <div id="results"></div>
                <button class="btn btn-secondary restart">Restart</button>
                <button id="submitTest" class="btn btn-primary">Submit Test</button>
            </div>
        </div>
    </div>

    <footer class="text-center py-4">
        <p>PHP Knowledge Test – Empowering Developers</p>
        <p>© 2023 PHP Knowledge Test. All Rights Reserved.</p>
        <div class="footer-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Support</a>
            <a href="#">Feedback</a>
            <a href="#">Sitemap</a>
        </div>
    </footer>
    <script>
    document.getElementById('b4').addEventListener('click', function() {
        var target = document.getElementById('targetSection');
        target.scrollIntoView({ behavior: 'smooth' });
    });
    
    
    /***score*/ 
    document.addEventListener('DOMContentLoaded', function() {

        // Submit score when the 'Submit Test' button is clicked
        document.getElementById('submitTest').addEventListener('click', function() {
           //Replace with actual score logic
            submitScore(score);
            alert('Test score saved successfully!');
        });

            document.querySelector('.restart').addEventListener('click', function() {
            alert('Test restarted!');
            // Reset the score
            score = 0;
            // Reset the current question index
            currentQuestionIndex = 0;
            // Reset the timer (if you have a timer)
                clearInterval(timerInterval);  // Clear any running timer
                startTimer();  // Optionally, restart the timer
                // Reset user answers
                userAnswers = [];
                // Reset the UI (e.g., question text, answer options)
                loadQuestion(currentQuestionIndex);
                // Hide the results section, if visible
                document.querySelector('.results-section').style.display = 'none';
                // Restart logic for the quiz (e.g., show the first question again)
                document.querySelector('.quiz-section').style.display = 'block';  // Show quiz section
            });

        });
    /************************* */
  
    </script>
    <script src="script.js"></script>
  
</body>
</html>
