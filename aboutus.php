<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        
        <meta name="author" content="Jacob Neale & Eric Li">
        <meta name="description" content="Sprint 2 for PL for Web Apps">
        <meta name="keywords" content="sprint uvafoodies">
        <title>Uva Foodies About Us</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="styles/main.css" rel="stylesheet">
        <style>
          .hover {
              cursor: pointer;
              font-weight: bold;
              color: pink;
          }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
              $("ul.navbar-nav li").on("mouseover", function() {
                  $(this).addClass("hover");
                  //alert("hello");
              });
              $("ul.navbar-nav li").on("mouseout", function() {
                  $(this).removeClass("hover");
              });
              $("ul.col-md-4.justify-content-end li").on("mouseover", function() {
                  $(this).addClass("hover");
              });
              $("ul.col-md-4.justify-content-end li").on("mouseout", function() {
                  $(this).removeClass("hover");
              });
            });
        </script>
    </head>
    <body>

        <!-- Header/Navbar-see index.html for more -->
        <header class="border-bottom">
            <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?command=welcome"><img src="LogoV1.png" alt="UVA Foodies Logo" height="50" width="50"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?command=welcome">Home</a>
                      </li> 
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?command=posts">Explore Posts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?command=restaurants">Restaurants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?command=aboutus">About Us</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <?php
                        $username=null;
                        if(isset($_SESSION["username"])){
                          $username = $_SESSION["username"];
                        }
                        if ($username===null){
                            echo "<form action='?command=goto_login' method='post'>
                            <button type='submit'>Sign In</button>
                            </form>";
                        }
                        else {
                            echo $username;
                            echo "<form action='?command=logout' method='post'>
                                    <button type='submit'>Log Out</button>
                                  </form>";
                        }
                        ?>
                  </div>
                </div>
              </nav>
        </header>

        <!-- Main content of this page. For computer screens, the text should take up half the page, and
        the pictures should take the other half. For slightly smaller screens, the text should take up
        the whole page, and the pictures should be below it, next to each other. For the smallest of 
        screens, the text and pictures should all be stacked on top of each other.  -->
        <div class="container">
          <h1>About Us</h1>
          <div class="row">
            <div class="col-lg-6">
              <p>We're undergrad students majoring in Computer Science at the University of Virginia. As part of our
                curriculum in Fall 2023, we took a class called Programming Languages for Web Applications, with 
                professor Robbie Hott. For our semester-long project in this class, we set out to improve one of the
                most crucial aspects of daily life at UVA: eating. Dining at UVA can be challenging, and even
                frustrating at times. The dining halls aren't always entirely clear about what they're serving, 
                restaurants run out of popular items, and some restaurant and dining hall hours can be downright 
                confusing. We aren't chefs, nor do we have the means to open a new restaurant on campus, but what we
                can do, we discovered, is centralize information about dining on campus. This website aims at doing 
                that by providing easy access to restaurant hours, menus, and reviews, as well as any food-related
                events that might be going on at UVA. Additionally, we hope to connect food-lovers at UVA as the
                University's first social media site centered around food. Feel free to post about your food hacks and
                experiences, interact with others' posts, and make new friends, and if you have any issues or concerns
                about our website, contact us using the information below.
              </p>
            </div>
            <div class="col-sm-6 col-lg-3">
              <figure>
                <!-- https://www.w3schools.com/tags/tag_figcaption.asp -->
                <img src="mejosie.png" width="250" height="500" alt="Image of Jacob Neale">
                <figcaption>Jacob Neale</figcaption>
              </figure>
            </div>
            <div class="col-sm-6 col-lg-3">
              <figure>
                <img src="eric.jpg" width="250" height="500" alt="Image of Eric Li">
                <figcaption>Eric Li</figcaption>
              </figure>
            </div>
          </div>
          <h3>Contact Us - hqn2se@virginia.edu</h3>
        </div>

        <!-- Footer/Navbar-see index.html for more -->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">© 2023 Jacob Neale, Eric Li</p>
          
              <a href="index.php?command=welcome" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="LogoV1.png" alt="UVA Foodies Logo" width="50" height="50">
              </a>
          
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="index.php?command=welcome" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="index.php?command=posts" class="nav-link px-2 text-muted">Explore Posts</a></li>
                <li class="nav-item"><a href="index.php?command=restaurants" class="nav-link px-2 text-muted">Restaurants</a></li>
                <li class="nav-item"><a href="index.php?command=aboutus" class="nav-link px-2 text-muted">About Us</a></li>
              </ul>
            </footer>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>