<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "pemweb");

// Register
if (isset($_POST['register'])) {
    $_SESSION['msg_type'] = 'register';
    $username = $mysqli->real_escape_string($_POST['reg_username']);
    $email = $mysqli->real_escape_string($_POST['reg_email']);
    $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

    $check = $mysqli->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
    if ($check->num_rows > 0) {
        $_SESSION['msg'] = "Username or Email already exists!";
    } else {
        $mysqli->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
        $_SESSION['msg'] = "Registration successful! Please login.";
        $_SESSION['msg_type'] = 'login';
    }
    header("Location: login.php");
    exit;
}

// Login
if (isset($_POST['login'])) {
    $_SESSION['msg_type'] = 'login';
    $username = $mysqli->real_escape_string($_POST['login_username']);
    $password = $_POST['login_password'];

    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: landing.php");
            exit();
        } else {
            $_SESSION['msg'] = "Wrong password!";
        }
    } else {
        $_SESSION['msg'] = "User not found!";
    }
    header("Location: login.php");
    exit;
}

// Forgot Password
if (isset($_POST['forgot'])) {
    $_SESSION['msg_type'] = 'forgot';
    $email = $mysqli->real_escape_string($_POST['forgot_email']);
    $new_password = $_POST['forgot_new_password'];
    $confirm_password = $_POST['forgot_confirm_password'];

    if ($new_password !== $confirm_password) {
        $_SESSION['msg'] = "Passwords do not match!";
        header("Location: login.php");
        exit;
    }
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $result = $mysqli->query("UPDATE users SET password='$hash' WHERE email='$email'");
    if ($mysqli->affected_rows > 0) {
        $_SESSION['msg'] = "Password updated! Please login.";
        $_SESSION['msg_type'] = 'login';
    } else {
        $_SESSION['msg'] = "Email not found!";
    }
    header("Location: login.php");
    exit;
}
?>