<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create an Account</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('https://images.unsplash.com/photo-1524168948265-8f79ad8d4e33?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
      backdrop-filter:blur(10px);
      background-size: cover;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-box {
      background-color: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      font-size: 1.5rem;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
    }

    .checkbox-group input {
      margin-right: 0.5rem;
    }

    .submit-btn {
      background-color: #0066cc;
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      width: 100%;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #005bb5;
    }

    .divider {
      text-align: center;
      margin: 1rem 0;
      color: #777;
    }

    .google-btn {
      background-color: white;
      color: #555;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .google-btn img {
      width: 20px;
      margin-right: 0.5rem;
    }

    .google-btn:hover {
      background-color: #f7f7f7;
    }

    .signin-link {
      text-align: center;
      margin-top: 1rem;
    }

    .signin-link a {
      color: #0066cc;
      text-decoration: none;
    }

    .signin-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-box">
      <h2>Create an account</h2>
      <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="username">Your Username</label>
          <input type="text" id="username" name="username" placeholder="Your Username" required>
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="At least 8 characters" required>
        </div>
        <div class="checkbox-group">
          <input type="checkbox" id="terms" name="terms" required>
          <label for="terms">I agree to all the <a href="#">Terms, Privacy Policy and Fees</a></label>
        </div>
        <button type="submit" class="submit-btn">Continue</button>
        <div class="divider">OR</div>
        <button type="button" class="google-btn">
          <img src="google-icon-url" alt="Google Icon"> Sign up with Google
        </button>
        <div class="signin-link">
          Have an account? <a href="#">Sign In</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>