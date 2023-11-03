<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="CS4640 Fall 2023">
  <meta name="description" content="An example PHP Form page">  
  <title>UVAFoodies Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>
    <div>
        <form action="?command=welcome" method=post>
            <button type="submit">Go Home</button>
      </form>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-5">
      <div>
        <form action="?command=verify_login" method="post">
            <div>
              <label for="name" style="margin-right:5px">Username</label>
              <input type="text" id="name" name="username">
            </div>
            <div>
              <label for="psswd" style="margin-right:10px">Password</label>
              <input type="text" id="psswd" name="password">
            </div>
            <div class="d-flex justify-content-center mt-2">
              <button type="submit">Log In</button>
            </div>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <form action="?command=signup" method="post">
          <button type="submit">Sign Up</button>
        </form>
    </div>
</html>