<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    <title>create acount</title>
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
    /********************************************************************************/
   /* General Styles */
main {
   
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-out;
}

/* Heading Styles */
main h1 {
    font-size: 2.5rem;
    color: #28537d;
    margin-bottom: 20px;
    animation: slideInFromLeft 1s ease-out;
}

main h2 {
    font-size: 2rem;
    color: #333;
    margin-top: 20px;
    margin-bottom: 15px;
    animation: slideInFromRight 1s ease-out;
}

/* Paragraph and List Styles */
main p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

main ul {
    list-style-type: disc;
    margin-left: 20px;
}

main li {
    margin-bottom: 10px;
}

/* Button Styles */
.cta-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #28537d;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.cta-button:hover {
    background-color: #1a3b6e;
    transform: scale(1.05);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideInFromLeft {
    from {
        transform: translateX(-20px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInFromRight {
    from {
        transform: translateX(20px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    main {
        padding: 20px;
    }
    
    main h1 {
        font-size: 2rem;
    }

    main h2 {
        font-size: 1.5rem;
    }

    .cta-button {
        padding: 8px 16px;
        font-size: 0.875rem;
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
                   <a href="signin.php" style="text-decoration: none;color:black;"><button class="btn btn-primary " id="b">Sign In</button></a>
                    <a href="createacount.php"style="color:white;text-decoration:none"><button class="btn btn-primary" id="b2">Create Account</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="center" >
    
    <main>
    <h1>PHP Knowledge Test Service</h1>
<section id="intro-section">
    <h2>Why Choose Our PHP Test?</h2>
    <p>Our PHP knowledge test is designed to assess your PHP skills, whether you are a beginner developer or an experienced professional. It covers a wide range of topics, from the basics to advanced concepts.</p>
</section>

        <section id="features-section">
            <h2>Test Features</h2>
            <ul>
                <li><strong>Comprehensive Evaluation:</strong> Test your skills in various aspects of PHP, including syntax, functions, and best practices.</li>
                <li><strong>Varied Questions:</strong> Each question is designed to thoroughly test your knowledge.</li>
                <li><strong>Instant Feedback:</strong> Get your results immediately after completing the test.</li>
                <li><strong>Additional Resources:</strong> Access educational resources to improve your PHP skills.</li>
            </ul>
        </section>

        <section id="cta-section">
            <h2>Ready to Get Started?</h2>
            <p>Join our platform today and start testing your PHP skills. Sign up to access the test or start immediately.</p>
            <a href="createacount.html" class="cta-button" style="text-decoration: none;color: #ffffff;">Create an Account</a>
            <a href="index.html" class="cta-button" style="text-decoration: none;color: #ffffff;">Start the Test</a>
        </section>
        </main>

        <div class="container text-center ">
            <h1 style="color: #ffffff;;">Unlock Your PHP Potential Today! <a href="#" style="color: #ffffff;">Discover More</a></h1>
            <h2 style="color: #fff7f7;;">Elevate Your Coding Skills with Our PHP Knowledge Test!</h2>
            <h3 style="color: #ffffff;;">Challenge yourself with our interactive quiz designed to assess your PHP expertise and boost your confidence.</h3>
            <div class="button-group mt-4">
                <button id="b4" class="btn btn-success" >Get Started Now!</button>
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
    
    <script src="script.js"></script>
</body>
</html>