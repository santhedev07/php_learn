<?php
include 'services/connection.php';
class Auth
{
    public $message;

    public function register($username, $password, $db)
    {
        // Check if username already exists
        $checkStmt = $db->prepare("SELECT id FROM users WHERE username = ?");
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $this->message = "Registration failed: username already exists.";
        } else {
            // Proceed with registration
            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            if ($stmt->execute()) {
                $this->message = "Registration successful! Login now.";
            } else {
                $this->message = "Registration failed: username might be taken.";
            }
            $stmt->close();
        }

        $checkStmt->close();
    }

    public function login($username, $password, $db)
    {
        $stmt = $db->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
        // Bind the username and password as strings to the SQL statement
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();

         if ($stmt->num_rows > 0) {
            $this->message = "Login successful!";
            header("Location: dashboard.php");
            exit;
        } else {
            $this->message = "Login unsuccessful: Invalid username or password.";
        }

        $stmt->close();
    }
    public function getMessage()
    {
        return $this->message;
    }
}
?>