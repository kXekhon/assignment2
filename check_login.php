<?php
// Replace with your actual login logic
$validCredentials = [
    'Stephen' => 'Drs123!',
    'Abigale' => 'Dra456!',
    'Kiyoko' => 'Nki789!'
];

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'];
    $password = $data['password'];

    if (array_key_exists($username, $validCredentials) && $validCredentials[$username] === $password) {
        session_start();
        $_SESSION['user'] = $username;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
