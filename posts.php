<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Eric Li, Jacob Neale">
        <meta name="description" content="Make your own post.">
        <meta name="keywords" content="Posts Users Account Explore">
        <title>Submit a Post</title> 
        <link rel="stylesheet" href="styles/explore.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">       
    </head>  
    <body>
        <!--The header of the web page-->
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
                        <a class="nav-link" href="explore.html">Explore Posts</a>
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
                    <a href="#" ><img src="pfp.png" alt="Profile Picture" height="35" width="35"></a>
                  </div>
                </div>
              </nav>
        </header>

        <!--Form box-->
        <section class="box">
            <h1>Create a Post</h1>
            <form action="?command=submit" method="post">
                <label for="title">Title:</label>

                <!--Title of Post-->
                <!--input type="text" id="title" name="title" size="80" required-->
                <input type="text" id="title" name="title" style="width: 80%;" required>
        
                <br>

                <label id="wordcount">0 words</label><br>
        
                <!--Main Post-->
                <!--textarea id="story" name="story" rows="10" cols="100" maxlength="400" required></textarea-->
                <label for="story">Post:</label><br>
                <textarea name="story" id="story" rows="10" style="width: 80%;" maxlength="400" required></textarea>

                <br>
        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>

        <!--The footer-->
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
                <li class="nav-item"><a href="abooutus.html" class="nav-link px-2 text-muted">About Us</a></li>
              </ul>
            </footer>
          </div>
          <script src="posts.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>