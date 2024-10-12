<?php
session_start();
require_once 'database.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password fields are not empty
    if (!empty($email) && !empty($password)) {
        try {
            // Prepare SQL query to fetch user by email
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // Fetch the user from the database
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Successful login, store session variables
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['nickname'] = $user['nickname'];
                
                // Redirect to the main page (index.php)
                header("Location: index.php");
                exit();
            } else {
                // Login failed: Invalid email or password
                $message = 'Le mot de passe ou l\'email sont incorrects !!';
            }
        } catch (PDOException $e) {
            // Display error in case of any issue with the query
            $message = 'Erreur de connexion: ' . $e->getMessage();
        }
    } else {
        // Handle case where email or password is empty
        $message = 'Veuillez remplir tous les champs !!';
    }
}

// Show error message if set
if (isset($message)) {
    echo '<p style="color:red;">' . $message . '</p>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    <title>sign in</title>
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
    /*********partie2****/
    h1 {
    font-family: 'Poppins', sans-serif, 'arial';
    font-weight: 600;
    font-size: 72px;
    color: white;
    text-align: center;
}

h4 {
    font-family: 'Roboto', sans-serif, 'arial';
    font-weight: 400;
    font-size: 20px;
    color: #9b9b9b;
    line-height: 1.5;
}

/* ///// inputs /////*/

input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em;
    color: #999;
    top: -5px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input {
    float: left;
    width: 293px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}

.styled-input label {
    color: #999;
    padding: 1.3rem 30px 1rem 30px;
    position: absolute;
    top: 10px;
    left: 0;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 650px;
    max-width: 100%;
}

input,
textarea {
    padding: 30px;
    border: 0;
    width: 100%;
    font-size: 1rem;
    background-color: #23405c;
    color: white;
    border-radius: 4px;
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    min-height: 15em;
}

.input-container {
    width: 650px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    float:right;
    padding: 7px 35px;
    border-radius: 60px;
    display: inline-block;
    background-color: #253653;
    color: white;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.06),
              0 2px 10px 0 rgba(0,0,0,0.07);
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.submit-btn:hover {
    transform: translateY(1px);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.10),
              0 1px 1px 0 rgba(0,0,0,0.09);
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

input[type=checkbox] + label {
  color: #ccc;
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
} /*******************/
/* Keyframes for subtle slide and fade animation */
@keyframes slideInFade {
    0% {
        opacity: 0;
        transform: translateX(-50px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Apply animation and styling to the card */
.card {
    animation: slideInFade 0.8s ease-out;
    border: 1px solid #23457d;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Style the input fields */
.form-control {
    border-radius: 25px;
    border: 1px solid #23457d;
    padding: 10px 15px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    border-color: #1b345d;
    box-shadow: 0 0 8px rgba(35, 69, 125, 0.5);
}

/* Style the button */
.btn-primary {
    background-color: #23457d;
    border-color: #23457d;
    border-radius: 25px;
    padding: 10px 20px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: #1b345d;
    transform: scale(1.05);
}

/* Style for the 'Forgot password?' link */
.forgot-password {
    color: #23457d;
    text-decoration: none;
    margin-top: 15px;
    display: block;
    text-align: right;
    transition: color 0.3s ease;
}

.forgot-password:hover {
    color: #1b345d;
}

/* Animation for the section */
section {
    animation: slideInFade 0.8s ease-out;
}
/****************************************************/
/* Container Styles */
.signin-section {
    max-width: 900px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form Heading */
.signin-heading {
    text-align: center;
    color: #23457d;
    font-size: 24px;
    margin-bottom: 20px;
    animation: slideDown 0.8s ease-in-out;
}

/* Slide-down Animation */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Input Fields */
.signin-input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    animation: fadeIn 1s ease-in-out;
}

/* Labels */
.signin-label {
    font-size: 14px;
    color: #23457d;
    margin-bottom: 5px;
    display: block;
}

/* Checkbox Wrapper */
.signin-checkbox-wrapper {
    margin: 15px ;
    display: flex;
    align-items: center;
}

/* Checkbox */
.signin-checkbox {
   /* Container Styles */
.signin-section {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form Heading */
.signin-heading {
    text-align: center;
    color: #23457d;
    font-size: 24px;
    margin-bottom: 20px;
    animation: slideDown 0.8s ease-in-out;
}

/* Slide-down Animation */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Input Fields */
.signin-input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    animation: fadeIn 1s ease-in-out;
}

/* Labels */
.signin-label {
    font-size: 14px;
    color: #23457d;
    margin-bottom: 5px;
    display: block;
}

/* Checkbox Wrapper */
.signin-checkbox-wrapper {
    align-items: center;
    display: flex;
    align-items: center;
}

/* Checkbox */
.signin-checkbox {
    margin-right: 0
}

/* Checkbox Label */
.signin-checkbox-label {
    font-size: 14px;
    color: #23457d;
    
}

/* Submit Button */
.signin-button {
    width: 100%;
    padding: 10px;
    background-color: #23457d;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    transition: transform 0.3s ease-in-out;
    animation: fadeIn 1s ease-in-out;
}

/* Button Hover Effect */
.signin-button:hover {
    transform: scale(1.05);
}

/* Link Styles */
.signin-link {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #23457d;
    text-decoration: none;
    font-size: 14px;
    animation: fadeIn 1s ease-in-out;
}

.signin-link:hover {
    text-decoration: underline;
}

/* Email Help Text */
.signin-help {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 15px;
}

}

/* Checkbox Label */
.signin-checkbox-label {
    font-size: 14px;
    color: #23457d;
}

/* Submit Button */
.signin-button {
    width: 100%;
    padding: 10px;
    background-color: #23457d;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    transition: transform 0.3s ease-in-out;
    animation: fadeIn 1s ease-in-out;
}

/* Button Hover Effect */
.signin-button:hover {
    transform: scale(1.05);
}

/* Link Styles */
.signin-link {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #23457d;
    text-decoration: none;
    font-size: 14px;
    animation: fadeIn 1s ease-in-out;
}

.signin-link:hover {
    text-decoration: underline;
}

/* Email Help Text */
.signin-help {
    font-size: 12px;
    color: #6c757d;
    margin-bottom: 15px;
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
                   <a href="signnin.php" style="text-decoration: none;color:black;"> <button class="btn btn-primary " id="b">Sign In</button></a>
                    <a href="createacount.php"style="color:white;text-decoration:none"><button class="btn btn-primary" id="b2">Create Account</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="center" >
        <div class="container text-center ">
            <h1>Unlock Your PHP Potential Today! <a href="#">Discover More</a></h1>
            <h2>Elevate Your Coding Skills with Our PHP Knowledge Test!</h2>
            <h3 style="color: #666;;">Challenge yourself with our interactive quiz designed to assess your PHP expertise and boost your confidence.</h3>
            <div class="button-group mt-4">
                <button id="b4" class="btn btn-success">Click Here</button>
            </div>
        </div>
    </div>
    <section class="signin-section" id="targetSection">
        <h2 class="signin-heading">Sign In</h2>
      <!-- File: signin.php -->
<form class="signin-form" method="POST" action="">
    <label for="email">Email address</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Sign In</button>
</form>

  

    </section>
    
    
    
    
    
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
/***scroll down*/
document.getElementById('b4').addEventListener('click', function() {
            var target = document.getElementById('targetSection');
            target.scrollIntoView({ behavior: 'smooth' });
        });
        

        </script>
</body>
</html>