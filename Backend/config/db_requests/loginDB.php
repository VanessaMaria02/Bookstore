<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

header('Content-Type: application/json'); // Set the header to application/json

   

    error_log('Received login request for user: ' . $username);

    require_once "dbacess.php";
    
    $stmt = $db->prepare("SELECT * FROM user WHERE u_username = ?");
    $stmt->bind_param("s", $username);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            if ($password == $user["u_password"]) { // Compare hashed passwords
                $_SESSION["user"] = "yes";
                $res['success'] = true;
            } else {
                $res['success'] = false;
                $res['message'] = 'Password does not match';
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Username not found';
            //echo json_encode(['success' => false, 'message' => 'Username not found']);
        }
    } else {
        $res['success'] = false;
        $res['message'] = 'Query execution failed';
        //echo json_encode(['success' => false, 'message' => 'Query execution failed']);
    }
    
    $stmt->close();
    $db->close();

?>
