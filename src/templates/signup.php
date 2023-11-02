<!DOCTYPE html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="CS4640 Fall 2023">
  <meta name="description" content="An example PHP Form page">  
  <title>UVAFoodies Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>
<body>
    <form action="?command=verify_signup" method="post">
        <label for="name">Username</label>
        <input type="text" id="name" name="username">
        <label for="psswd">Password</label>
        <input type="text" id="psswd" name="password">
        <label for="vpsswd">Verify Password</label>
        <input type="text" id="vpsswd" name="verify_password">
        <button type="submit">Sign Up</button>
    </form>
</body>