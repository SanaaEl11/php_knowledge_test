<?php
session_start();
require_once 'database.php';  // Include your database connection

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit();
}

// Check if the user is logged in
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

// Get the posted data from the request body
$input = json_decode(file_get_contents('php://input'), true);

// DEBUG: Check what is received
error_log(print_r($input, true));  // This logs the raw input to error logs

// Validate the 'score' field
if (isset($input['score']) && is_numeric($input['score'])) {
    $score = filter_var($input['score'], FILTER_VALIDATE_INT);
    if ($score === false) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid score value']);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Score is missing or invalid']);
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Insert the score into the database
try {
    $stmt = $conn->prepare("INSERT INTO test_results (user_id, score, test_date) VALUES (:user_id, :score, NOW())");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':score', $score, PDO::PARAM_INT);
    $stmt->execute();

    // Send success response
    echo json_encode(['status' => 'success', 'message' => 'Score saved successfully']);
} catch (PDOException $e) {
    // Log the error and send error response
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Failed to save score']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Submission</title>
</head>
<body>
    
</body>
</html>
