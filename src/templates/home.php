<!DOCTYPE html>
<!-- URL FOR SITE ON SERVER: https://cs4640.cs.virginia.edu/hqn2se/PlWebAppsProject/ -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        
        <meta name="author" content="Jacob Neale & Eric Li">
        <meta name="description" content="Sprint 2 for PL for Web Apps">
        <meta name="keywords" content="sprint uvafoodies">
        <title>Uva Foodies Home</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="styles/main.css" rel="stylesheet">
    </head>
    <body>
        <!-- Header/Navbar, derived from Bootstrap documentation. -->
        <header class="border-bottom">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.html"><img src="LogoV1.png" alt="UVA Foodies Logo" height="50" width="50"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <form action="?command=posts" method="post">
                          <button type='submit'>Explore posts</button>
                        </form>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="restaurants.html">Restaurants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="events.html">Events</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About Us</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <?php
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

        <!-- CALENDAR VIEW -->
        <div class="container-fluid pagesection calendar">
          <h3 id="heading3">Calendar</h3>
          <div class="container-fluid scrollwheel-items">
            <div>
              <p>Monday</p>
              <p>Event-Summer Bash</p>
            </div>
            <div>
              <p>Tuesday</p>
              <p>O'Hill-Taco Tuesday</p>
            </div>
            <div>
              <p>Wednesday</p>
              <p>Newcomb-Wing Wednesday</p>
              <p>Event-Food Trucks Meal Exchange</p>
            </div>
            <div class="noevents">
              <p>Thursday</p>
              <p>No Events</p>
            </div>
            <div class="noevents">
              <p>Friday</p>
              <p>No events</p>
            </div>
            <div class="noevents">
              <p>Saturday</p>
              <p>No events</p>
            </div>
            <div class="noevents">
              <p>Sunday</p>
              <p>No events</p>
            </div>
          </div>
        </div>

        <!-- FEED VIEW -->
        <div class="container-fluid pagesection myfeed">
          <h3>My Feed</h3>
          <div class="container-fluid scrollwheel-items">
            <div>
              <div class="postheader">
                <h3>Too few late night</h3>
                <p>Post by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div>
              <div class="postheader">
                <h3>The new event is</h3>
                <p>Post by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div>
              <div class="postheader">
                <h3>O'hill scrambled eggs</h3>
                <p>Review by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div>
              <div class="postheader">
                <h3>Ultimate O'hill burger build</h3>
                <p>Post by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div>
              <div class="postheader">
                <h3>The downfall of West Range</h3>
                <p>Review by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div>
              <div class="postheader">
                <h3>What did I do to deserve this</h3>
                <p>Post by <a href="profile.html">@jacobneale</a></p>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. In nisl nisi scelerisque eu ultrices. Massa vitae tortor condimentum lacinia quis. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus.
              </p>
            </div>
            <div class="viewmore">
              <h3><a href="explore.html">See More Posts</a></h3>
              <p></p>
            </div>
          </div>
        </div>

        <!-- Footer/Navbar, derived from: https://getbootstrap.com/docs/5.2/examples/footers/ -->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">© 2023 Jacob Neale, Eric Li</p>
          
              <a href="index.html" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="LogoV1.png" alt="UVA Foodies Logo" width="50" height="50">
              </a>
          
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="explore.html" class="nav-link px-2 text-muted">Explore Posts</a></li>
                <li class="nav-item"><a href="restaurants.html" class="nav-link px-2 text-muted">Restaurants</a></li>
                <li class="nav-item"><a href="events.html" class="nav-link px-2 text-muted">Events</a></li>
                <li class="nav-item"><a href="aboutus.html" class="nav-link px-2 text-muted">About Us</a></li>
              </ul>
            </footer>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>