<?php
session_start();

$usersFile = 'users.txt';
$accessAttemptsFile = 'accessattempts.txt';

function isUserValid($username, $password) {
    global $usersFile;

    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(':', $user);
        if ($username === $storedUsername && $password === $storedPassword) {
            return true;
        }
    }

    return false;
}

function logAccessAttempt($username) {
    global $accessAttemptsFile;

    $attempt = "$username - " . date('Y-m-d H:i:s') . "\n";
    file_put_contents($accessAttemptsFile, $attempt, FILE_APPEND);
}

function registerUser($newUsername, $newPassword) {
    global $usersFile;

    $userEntry = "$newUsername:$newPassword\n";
    file_put_contents($usersFile, $userEntry, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isUserValid($username, $password)) {
        $_SESSION['user'] = $username;
        header('Location: admin_panel.php');
        exit;
    } else {
        logAccessAttempt($username);
        $errorMessage = "Invalid credentials. Please try again.";
    }
}

if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newUsername']) && isset($_POST['newPassword'])) {
        $newUsername = $_POST['newUsername'];
        $newPassword = $_POST['newPassword'];

        // Add new user to the list
        registerUser($newUsername, $newPassword);

        $registrationMessage = "User registered successfully.";
    }

    include('admin_panel.php');
} else {
    include('admin_login.html');
}
?>
