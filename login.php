<?php
session_start();
$msg = '';
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Register Forgot</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css"
</head>
<body>
  <div class="container">
    <!-- Login -->
    <div class="form-box login">
      <form action="auth.php" method="POST">
        <h1 style="color: #1e93ab">Login</h1>
        <?php if($msg && isset($_SESSION['msg_type']) && $_SESSION['msg_type']=='login'){ echo "<p style='color:red;'>$msg</p>"; } ?>
        <div class="input-box">
          <input type="text" name="login_username" required>
          <label>Username</label>
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input type="password" name="login_password" required>
          <label>Password</label>
          <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="remember-box">
            <div class="remember">
            <input type="checkbox" name="rmbr" id="remember">
            <label for="rmbr">Remember Me</label>
            </div>
        <div class="forgot-link">
            <a href="#" id="forgotBtn">Forgot Password?</a>
        </div>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <p>Or Login with:</p>
        <div class="social-icons">
          <a href="#"><i class='bx bxl-google'></i></a>
          <a href="#"><i class='bx bxl-facebook'></i></a>
          <a href="#"><i class='bx bxl-apple'></i></a>
        </div>
      </form>
    </div>

    <!-- Register -->
    <div class="form-box register">
      <form action="auth.php" method="POST">
        <h1 style="color: #1e93ab;">Register</h1>
        <?php if($msg && isset($_SESSION['msg_type']) && $_SESSION['msg_type']=='register'){ echo "<p style='color:red;'>$msg</p>"; } ?>
        <div class="input-box">
          <input type="text" name="reg_username" required>
          <label>Username</label>
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
            <input type="email" name="reg_email" required>
            <label>Email</label>
            <i class="bx bxs-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" name="reg_password" required>
            <label>Password</label>
            <i class="bx bxs-lock-alt"></i>
        </div>
        <button type="submit" name="register" class="btn">Register</button>
        <p>Or Register with:</p>
        <div class="social-icons">
            <a href="#"><i class='bx bxl-google'></i></a>
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-apple'></i></a>
        </div>
    </form>
</div>

<!-- Forgot Password -->
<div class="form-box forgot">
    <form action="auth.php" method="POST">
        <h1>Forgot Password</h1>
        <?php if($msg && isset($_SESSION['msg_type']) && $_SESSION['msg_type']=='forgot'){ echo "<p style='color:red;'>$msg</p>"; } ?>
        <div class="input-box">
            <input type="email" name="forgot_email" required>
            <label>Email</label>
            <i class="bx bxs-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" name="forgot_new_password" required>
            <label>New Password</label>
            <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="input-box">
            <input type="password" name="forgot_confirm_password" required>
            <label>Confirm Password</label>
            <i class="bx bxs-lock-alt"></i>
        </div>
        <button type="submit" name="forgot" class="btn">Reset Password</button>
        <button id="backLogin">Back</button>
      </form>
    </div>

    <!-- Toggle Box -->
    <div class="toggle-box">
      <div class="toggle-panel toggle-left">
        <h1>Hello Welcome</h1>
        <p>Dont have an account?</p>
        <button class="btn register-btn">Register</button>
      </div>
    </div>
    <div class="toggle-panel toggle-right">
      <h1>Welcome Back</h1>
      <p>Already have an account?</p>
      <button class="btn login-btn">Login</button>
    </div>
  </div>

  <script>
    const container = document.querySelector('.container')
    const registerBtn = document.querySelector('.register-btn')
    const loginBtn = document.querySelector('.login-btn')

    const forgotBtn = document.getElementById('forgotBtn')
    const backLogin = document.getElementById('backLogin')

    registerBtn.addEventListener('click', () =>{
      container.classList.add('active')
    })
    loginBtn.addEventListener('click', () =>{
      container.classList.remove('active')
    })

    forgotBtn.addEventListener('click', (e) =>{
      e.preventDefault();
      container.classList.add('forgot-active')
    })

    backLogin.addEventListener('click', (e) =>{
      e.preventDefault();
      container.classList.remove('forgot-active')
    })
  </script>
</body>
</html>