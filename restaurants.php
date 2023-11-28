<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Eric Li, Jacob Neale">
        <meta name="description" content="The restaurants available at UVA">
        <meta name="keywords" content="O'Hill Newcomb Runk Fresh Food Company UVA Food">
        <title>Restaurants</title>
        <link rel="stylesheet" href="styles/explore.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">        
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
        <script src="restaurants.js" type="text/javascript"></script>
    </head>  
    <body>
        <!--The header of the web page-->
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

        <!--The main title of the page-->
        <section class="box">
          <h1>Restaurants</h1>
        </section>

        <!--Container for restaurants-->
        <section class="box">
            <div class="row row-cols-auto" id="cardstable">
            </div>
        </section>

        <!--The footer-->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">© 2023 Jacob Neale, Eric Li</p>
          
              <a href="index.html" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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