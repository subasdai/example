<?php
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the username and password are correct
$users = file_get_contents('users.txt');
$users = explode("\n", $users);

$loggedIn = false;
foreach ($users as $user) {
    list($storedUsername, $storedPassword) = explode(':', $user);
    if ($username === $storedUsername && password_verify($password, trim($storedPassword))) {
        $loggedIn = true;
        break;
    }
}

if ($loggedIn) {
    echo 'Login successful!';
} else {
    echo 'Login failed. Invalid username or password.';
}