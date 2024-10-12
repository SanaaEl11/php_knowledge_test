<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $email = $_POST['email1']; //
    $nickname = $_POST['nick1']; 
    $password = $_POST['pass1']; // 

    // Validate form inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("email is not correct");
    }

    // Hash the password for security
    $hashed_password = password_hash('user_password', PASSWORD_DEFAULT);

    // Database connection
    $host = "localhost";
    $db_name = "php_knowledge_test";
    $username = "root";
    $db_password = "";

    try {
        // Connect to the database
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        // Insert user data into the database
        $query = "INSERT INTO users (email, nickname, password) VALUES (:email, :nickname, :password)";
        $stmt = $conn->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':password', $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            echo "Account created successfully!";
        } else {
            echo "An error occurred while creating the account.";    
      }

    } catch (PDOException $e) {
        echo "Connection error:  " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    <title>create acount</title>
   
<style>
    
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
    /*********************************************************************************/
    /* Global Styles */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: #0c0c0d;
    background: #e9f1f3;
    box-sizing: border-box;
}

a {
    text-decoration: none;
    color: #23457d;
}

a:hover {
    text-decoration: underline;
}

button {
    border: none;
    cursor: pointer;
    font-family: inherit;
}

/* Navbar Styles */
.navbar {
    border-bottom: 1px solid #ddd;
}

.navbar-brand {
    color: #28537d;
}

.navbar-nav .nav-link {
    color: #0c0c0d;
}

.navbar-nav .nav-link:hover {
    color: #23457d;
}

.btn-primary {
    background-color: #23457d;
    color: #fff;
    border-radius: 25px;
    padding: 10px 20px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #1a2a55;
}



.button-group .btn-success {
    background-color: #23457d;
    color: #ffffff;
    border-radius: 25px;
    padding: 12px 25px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.button-group .btn-success:hover {
    background-color: #1a2a55;
    transform: scale(1.05);
}

/* Create Account Form Styles */
#targetSection {
    background-color: #ffffff;
    padding: 40px;
    margin: 20px auto;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    box-sizing: border-box;
}

.frm__title {
    text-align: center;
    color: #23457d;
    font-size: 28px;
    margin-bottom: 20px;
}

.frm__create__account {
    display: flex;
    flex-direction: column;
}

.frm-group {
    margin-bottom: 20px;
}

.frm-group label {
    display: block;
    font-size: 16px;
    color: #23457d;
    margin-bottom: 8px;
}

.frm-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.frm-group input:focus {
    border-color: #23457d;
    box-shadow: 0 0 8px rgba(35, 69, 125, 0.2);
    outline: none;
}

.frm-group.inline {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.frm-group.inline .frm-group {
    flex: 1;
    min-width: 200px;
}

.frm-info {
    text-align: center;
    margin: 20px 0;
}

.frm__txt {
    font-size: 14px;
    color: #555;
}

.frm__link {
    color: #23457d;
    text-decoration: none;
}

.frm__btn-primary {
    background-color: #23457d;
    color: #ffffff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}

.frm__btn-primary:hover {
    background-color: #1a2a55;
    transform: scale(1.05);
}

.frm__or {
    text-align: center;
    margin: 20px 0;
    font-size: 16px;
    color: #666;
}

.frm-group a {
    text-decoration: none;
    color: #23457d;
    font-size: 14px;
    padding: 10px;
    border-radius: 8px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.frm-group a:hover {
    background-color: #f4f4f4;
}

.frm__twitter {
    background-color: #1da1f2;
    color: #ffffff;
    padding: 10px;
}

.frm__facebook {
    background-color: #4267b2;
    color: #ffffff;
    padding: 10px;
}

/* Ajay Section */
.ajay {
    text-align: center;
    margin: 20px 0;
}

.ajay a {
    color: #23457d;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
}

.ajay a:hover {
    text-decoration: underline;
}

/* Responsive Styles */
@media (max-width: 1200px) {
    #targetSection {
        padding: 30px;
    }

    .frm__title {
        font-size: 26px;
    }

    .frm-group input {
        font-size: 15px;
        padding: 10px;
    }

    .frm__btn-primary {
        font-size: 16px;
        padding: 10px;
    }

    .frm__or {
        font-size: 14px;
    }

    .frm-group a {
        font-size: 13px;
        padding: 8px;
    }
}

@media (max-width: 992px) {
    #targetSection {
        padding: 25px;
    }

    .frm__title {
        font-size: 24px;
    }

    .frm-group.input {
        font-size: 14px;
        padding: 8px;
    }

    .frm__btn-primary {
        font-size: 15px;
        padding: 8px;
    }

    .frm__or {
        font-size: 13px;
    }

    .frm-group a {
        font-size: 12px;
        padding: 6px;
    }
}

@media (max-width: 768px) {
    .frm-group.inline {
        flex-direction: column;
    }

    .frm-group.inline .frm-group {
        margin-bottom: 15px;
        flex: none;
        width: 100%;
    }

    .frm-group input {
        font-size: 14px;
        padding: 8px;
    }

    .frm__btn-primary {
        font-size: 14px;
        padding: 10px;
    }
}

@media (max-width: 576px) {
    #targetSection {
        padding: 20px;
    }

    .frm__title {
        font-size: 22px;
    }

    .frm-group input {
        font-size: 13px;
        padding: 7px;
    }

    .frm__btn-primary {
        font-size: 13px;
        padding: 8px;
    }

    .frm__or {
        font-size: 12px;
    }

    .frm-group a {
        font-size: 11px;
        padding: 5px;
    }
}


</style>
</head>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light bg-light mb-0">
        <div class="container-fluid">
            <a style="text-decoration: none;color: #28537d;" class="navbar-brand" href="index.php">
                <span id="span1" style="color: #28537d;">PHP</span> <span id="span2">TEST</span>
            </a>
            <div class="collapse navbar-collapse mb-0">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="text-decoration: none;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php"style="text-decoration: none;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php"style="text-decoration: none;">About us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="signin.php" style="text-decoration: none;color:black;"><button class="btn btn-primary " id="b">Sign In</button></a>
                 <a href="createacount.php"style="color:white;text-decoration:none."><button class="btn btn-primary" id="b2">Create Account</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="center" >
        <div class="container text-center ">
            <h1 style="color: #f4f4f4;">Unlock Your PHP Potential Today! <a href="#">Discover More</a></h1>
            <h2 style="color: #0c0c0d;">Elevate Your Coding Skills with Our PHP Knowledge Test!</h2>
            <h3 style="color: #666;">Challenge yourself with our interactive quiz designed to assess your PHP expertise and boost your confidence.</h3>
            <div class="button-group mt-4">
                <button id="b4" class="btn btn-success">Click Here </button>

            </div>
        </div>
    </div>
    <div class="container" id="targetSection" >
        <div class="wrapper">
          <div class="frm--create-account">
            <h1 class="frm__title" style="color: #0056b3;">Create Account</h1>
            <!-- create account form starts here -->
            <form id="createAccountForm" class="frm__create__account" method="POST" action="createacount.php">
  <div class="frm-group">
    <label for="email1">Your E-Mail</label>
    <input type="email" id="email1" name="email1" placeholder="Your E-Mail" onblur="validateEmail()">
  </div>
  <div class="frm-group inline">
    <div class="frm-group">
      <label for="nick1">Nickname</label>
      <input type="text" id="nick1" name="nick1" placeholder="Nickname" onblur="validateNickname()">
    </div>
    <div class="frm-group">
      <label for="pass1">Password</label>
      <input type="password" id="pass1" name="pass1" placeholder="Password" onblur="validatePassword()">
    </div>
  </div>
  <div class="frm-info">
    <p class="frm__txt">By creating an account you agree to the<br><a href="#" class="frm__link">Terms of Services</a> and <a href="#" class="frm__link">Privacy Policy</a></p>
  </div>
  <div class="frm-group">
    <input type="submit" class="frm__btn-primary" value="Sign Up">
  </div>
</form>

            <!-- /.create account form starts here -->
          </div>
        </div>
      </div>
    
    <div class="ajay">
      <a href="https://codepen.io/AjayRawatCodepen/" target="_blank">See more pens</a>
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


//SCROL DOWN
document.getElementById('b4').addEventListener('click', function() {
  var target = document.getElementById('targetSection');
  target.scrollIntoView({ behavior: 'smooth' });
});
//validation ofe crate an new acount*/
      function validateEmail() {
          const email = document.getElementById('email1').value.trim();
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
          }
        }
      
        
      
        function validatePassword() {
          const password = document.getElementById('pass1').value.trim();
          if (password === '') {
            alert('Password is required.');
          }
        }
      
        document.getElementById('createAccountForm').addEventListener('submit', function(event) {
          const email = document.getElementById('email1').value.trim();
          const nickname = document.getElementById('nick1').value.trim();
          const password = document.getElementById('pass1').value.trim();
          
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      
          // Check if fields are empty
          if (!email || !nickname || !password) {
            alert('All fields are required.');
            event.preventDefault();
            return;
          }
      
          // Check if email is valid
          if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            event.preventDefault();
            return;
          }
      
          // If validation is successful
          alert('Account created successfully!');
        });
      

</script>

</body>
</html>
