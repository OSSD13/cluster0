<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        margin: 0;
        padding: 0;
        background: url('https://images.unsplash.com/photo-1524168948265-8f79ad8d4e33?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        backdrop-filter:blur(10px);
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container{
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .login-container button {
        width: 100%;
        padding: 10px;
        background: #00408E;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-container button:hover {
        background: #0056b3;
    }

    .login-container .google-btn {
        background: white;
        color: #444;
        border: 1px solid #ccc;
    }

    .login-container .google-btn img {
        vertical-align: middle;
        margin-right: 10px;
    }

    .login-container .signup {
        margin-top: 20px;
    }

    .login-container .signup a {
        color: #00408E;
        text-decoration: none;
    }

    .login-container .signup a:hover {
        text-decoration: underline;
    }

    .login-container .name-program {
        margin-bottom: 20px;
        color: #00408E;
    }

    .login-container .or {
        width: 100%;
        text-align: center;
        margin: 20px 0;
        font-weight: bold;
        color: #CCCCCC;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #CCCCCC;
    }

    .remember-me input {
        margin: 0;
    }

    </style>
</head>
<body>
    <div class = "login-container">
        <img src="image 1.png" alt="Logo" style="width: 100px; margin-bottom: 20px;">
        <h2 class = "name-program">TTT Developer Performance</h2>
        <form action="login.php" method="post">
            <div >
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="username" class="form-control" id="exampleFormControlInput1" placeholder="Username">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
              </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">Sign In</button>
            <div class="or" style="margin: 20px 0;"><h5>OR</h5></div>
            <button type="button" class="google-btn">
                <img src="image 8.png" alt="Google Logo" style="width: 20px;"> Sign in with Google
            </button>
        </form>
        <div class="signup">
            Don't have an account yet? <a href="{{route('register')}}">Sign UP</a>
        </div>
    </div>
</body>
</html>
