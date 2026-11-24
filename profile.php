<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "pemweb");
$username = $_SESSION['user'];
$msg = "";

// Ambil data user
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
$user = $result->fetch_assoc();

// Update profile
if (isset($_POST['update'])) {
    $new_username = $mysqli->real_escape_string($_POST['username']);
    $new_email = $mysqli->real_escape_string($_POST['email']);

    // Cek jika username/email sudah dipakai user lain
    $check = $mysqli->query("SELECT * FROM users WHERE (username='$new_username' OR email='$new_email') AND username!='$username'");
    if ($check->num_rows > 0) {
        $msg = "Username atau Email sudah digunakan!";
    } else {
        $mysqli->query("UPDATE users SET username='$new_username', email='$new_email' WHERE username='$username'");
        $_SESSION['user'] = $new_username;
        $msg = "Profile berhasil diupdate!";
        // Refresh data user
        $result = $mysqli->query("SELECT * FROM users WHERE username='$new_username'");
        $user = $result->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Setting Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f3f2ec;
            font-family: 'Raleway', sans-serif;
        }
        .profile-container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 28px;
        }
        h2 {
            text-align: center;
            color: #E62727;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #222;
            font-weight: 600;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            font-family: inherit;
        }
        .btn {
            width: 100%;
            padding: 12px 0;
            background: #E62727;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background: #b71c1c;
        }
        .msg {
            text-align: center;
            margin-bottom: 16px;
            color: #E62727;
            font-weight: 600;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #E62727;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Setting Profile</h2>
        <?php if ($msg): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <button type="submit" name="update" class="btn">Update Profile</button>
        </form>
        <a href="landing.php" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>
</html>
