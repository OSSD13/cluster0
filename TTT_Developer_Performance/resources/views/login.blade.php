<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('image.png');
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
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

        .login-container .remember-me {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 10px 0;
            justify-content: flex-start;
        }

        .login-container .remember-me input {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class = "login-container">
        <img src="image 1.png" alt="Logo" style="width: 100px; margin-bottom: 20px;">
        <h2 class = "name-program">TTT Developer Performance</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">Sign In</button>
            <div class="or" style="margin: 20px 0;">
                <h5>OR</h5>
            </div>
            <button type="button" class="google-btn">
                <img src="image 8.png" alt="Google Logo" style="width: 20px;"> Sign in with Google
            </button>
        </form>
        <div class="signup">
            Don't have an account yet?
            <a href="/register" class="btn-signup">Sign UP</a>
        </div>
    </div>
</body>

</html>
