<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Eric">
  <meta name="description" content="Testlogin">  
  <title>Test Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>

<body>

<div class="container" style="margin-top: 15px;">
        <div class="row col-xs-12">
            <h1>Login Normally</h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <form action="?command=login" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="passwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwd" name="passwd">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
        </div>
        <div class="row col-xs-12">
            <h1>New Account</h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <form action="?command=newUser" method="post">
                <div class="mb-3">
                    <label for="nameN" class="form-label">New Username</label>
                    <input type="text" class="form-control" id="nameN" name="nameN">
                </div>
                <div class="mb-3">
                    <label for="passwdB" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="passwdB" name="passwdB">
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
            </div>
        </div>
    </div>
    <form action="?command=reset" method="post">
        <button type="submit" class="btn btn-primary">Reset</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>