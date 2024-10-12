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
    float: right;
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
        <div class="container text-center ">
            <h1>Unlock Your PHP Potential Today! <a href="#">Discover More</a></h1>
            <h2>Elevate Your Coding Skills with Our PHP Knowledge Test!</h2>
            <h3>Challenge yourself with our interactive quiz designed to assess your PHP expertise and boost your confidence.</h3>
            <div class="button-group mt-4">
                <button id="b4" class="btn btn-success">Get Started Now!</button>
            </div>
        </div>
    </div>

    <div class="container" id="targetSection">
        <div class="row">
                <h1 style="color: #23405c;">contact us</h1>
        </div>
        <div class="row">
                <h4 style="text-align:center">We'd love to hear from you!</h4>
        </div>
        <div class="row input-container">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" required />
                        <label>Name</label> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input">
                        <input type="text" required />
                        <label>Email</label> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input" style="float:right;">
                        <input type="text" required />
                        <label>Phone Number</label> 
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <textarea required></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="btn-lrg submit-btn">Send Message</div>
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
    <script>document.getElementById('b4').addEventListener('click', function() {
        var target = document.getElementById('targetSection');
        target.scrollIntoView({ behavior: 'smooth' });
    });
    
    </script>
    
</body>
</html>
