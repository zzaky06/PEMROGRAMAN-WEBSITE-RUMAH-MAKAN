<?php
session_start();
$msg = '';
$show_reset = false;
$email = '';

$mysqli = new mysqli("localhost", "root", "", "pemweb");

// Step 1: Cek email
if (isset($_POST['check_email'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $show_reset = true;
        $_SESSION['reset_email'] = $email;
    } else {
        $msg = "Email tidak ditemukan!";
    }
}

// Step 2: Reset password
if (isset($_POST['reset_password'])) {
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];
    $email = $_SESSION['reset_email'] ?? '';

    if (!$email) {
        $msg = "Session reset tidak valid. Silakan ulangi proses.";
    } elseif ($new !== $confirm) {
        $msg = "Password tidak sama!";
        $show_reset = true;
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $mysqli->query("UPDATE users SET password='$hash' WHERE email='$email'");
        unset($_SESSION['reset_email']);
        $msg = "Password berhasil direset! Silakan <a href='login.php'>login</a>.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lupa Password - HO&SW</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>
    :root {
      --primary: #d2042d;
      --dark: #111;
      --light: #f5f5f5;
      --radius: 12px;
      --shadow: 0 8px 20px rgba(0,0,0,.12);
    }
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Rubik',sans-serif}
    body{background:var(--light);display:flex;justify-content:center;align-items:center;min-height:100vh}
    .container{max-width:500px;width:90%;background:#fff;padding:30px;border-radius:var(--radius);box-shadow:var(--shadow)}
    .header{display:flex;align-items:center;gap:15px;margin-bottom:25px;font-size:1.4em;font-weight:bold}
    .back-btn{background:#6c757d;color:#fff;padding:8px 14px;border-radius:8px;text-decoration:none;font-size:0.9em;transition:.3s}
    .back-btn:hover{background:#5a6268;transform:translateY(-2px)}
    .form-group{display:flex;flex-direction:column;gap:6px}
    .form-group label{font-size:0.9em;font-weight:600;color:#555}
    .form-group input{padding:12px 15px;border:1px solid #ccc;border-radius:8px;font-size:1em;transition:border .2s,box-shadow .2s}
    .form-group input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 3px rgba(210,4,45,.15)}
    .btn-simpan{margin-top:10px;padding:14px;background:#2ecc71;color:#fff;border:none;border-radius:8px;font-size:1em;font-weight:600;cursor:pointer;transition:.3s;display:flex;align-items:center;justify-content:center;gap:8px;box-shadow:0 4px 10px rgba(46,204,113,.3)}
    .btn-simpan:hover{background:#27ae60;transform:translateY(-2px);box-shadow:0 6px 14px rgba(46,204,113,.35)}
    .btn-simpan:active{transform:scale(.98)}
    .info-text{font-size:0.8em;color:#777;margin-top:8px;text-align:center}
    .msg{margin-bottom:15px;text-align:center;color:#d2042d;font-weight:600;}
    .success{color:#2ecc71;}
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    <a href="login.php" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali</a>
    Lupa Password
  </div>
  <?php if ($msg): ?>
    <div class="msg<?= strpos($msg, 'berhasil') !== false ? ' success' : '' ?>"><?= $msg ?></div>
  <?php endif; ?>

  <?php if (!$show_reset && !isset($_SESSION['reset_email'])): ?>
    <!-- Step 1: Masukkan email -->
    <form method="POST">
      <div class="form-group">
        <label for="email">Email Terdaftar</label>
        <input type="email" id="email" name="email" placeholder="Contoh: email@domain.com" required>
      </div>
      <button type="submit" name="check_email" class="btn-simpan">
        <i class="fas fa-paper-plane"></i> Cek Email
      </button>
      <p class="info-text">Masukkan email yang terdaftar untuk reset password.</p>
    </form>
  <?php else: ?>
    <!-- Step 2: Reset password -->
    <form method="POST">
      <div class="form-group">
        <label for="new_password">Password Baru</label>
        <input type="password" id="new_password" name="new_password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Konfirmasi Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" name="reset_password" class="btn-simpan">
        <i class="fas fa-key"></i> Reset Password
      </button>
      <p class="info-text">Password baru akan langsung aktif setelah reset.</p>
    </form>
  <?php endif; ?>

  <p style="text-align:center;font-size:0.9em;color:#555;">
    Ingat password? <a href="login.php" style="color:var(--primary);">Login di sini</a>
  </p>
</div>
</body>
</html>