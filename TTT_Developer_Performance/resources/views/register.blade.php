<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create an Account</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('https://images.unsplash.com/photo-1524168948265-8f79ad8d4e33?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fA%3D%3D');
      backdrop-filter: blur(10px);
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

    .error {
      color: red;
      font-size: 0.85rem;
      display: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-box">
      <h2>Create an account</h2>
      <form id="register-form">
        <div class="form-group">
          <label for="username">Your Username</label>
          <input type="text" id="username" name="username" placeholder="Your Username">
          <small id="invalid-username" class="error">Please enter your username.</small>
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email">
          <small id="invalid-email" class="error">Please enter a valid email address.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="At least 8 characters">
          <small id="invalid-password" class="error">Password must contain at least 8 characters.</small>
        </div>
        <div class="checkbox-group">
          <input type="checkbox" id="terms" name="terms">
          <label for="terms">I agree to all the <a href="#">Terms, Privacy Policy and Fees</a></label>
          <small id="invalid-checkbox" class="error"></small>
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

  <script>
    $(document).ready(function () {
        $('#register-form').on('submit', function (event) {
            let username = $('#username').val().trim();
            let email = $('#email').val().trim();
            let password = $('#password').val().trim();
            let checkbox = $('#terms').prop('checked');
            let isValid = true;

            // เช็ก Username ต้องไม่เป็นค่าว่าง
            if (username === "") {
                $('#invalid-username').show();
                $('#username').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalid-username').hide();
                $('#username').removeClass('is-invalid');
            }

            // เช็ก Email ต้องมี @ และ .
            if (email === "" || !email.includes('@') || !email.includes('.')) {
                $('#invalid-email').show();
                isValid = false;
            } else {
                $('#invalid-email').hide();
            }

            // เช็ก Password ต้องมีอย่างน้อย 8 ตัวอักษร
            if (password.length < 8) {
                $('#invalid-password').show();
                isValid = false;
            } else {
                $('#invalid-password').hide();
            }

            // เช็ก Checkbox ต้องถูกติ๊ก
            if (!checkbox) {
                $('#invalid-checkbox').show();
                isValid = false;
            } else {
                $('#invalid-checkbox').hide();
            }

            // ถ้าไม่ผ่านเงื่อนไข หยุดการส่งฟอร์ม
            if (!isValid) {
                event.preventDefault();
                return;
            }

            event.preventDefault();

        });
    });
  </script>

</body>
</html>
