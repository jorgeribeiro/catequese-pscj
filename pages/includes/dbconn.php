<?php
class DbConn {
    public $conn;
    
    public function connectToDatabase() {
        require 'dbconf.php';
        $host = $host; // Host name
        $username = $username; // Mysql username
        $db_name = $db_name; // Database name
        $password = $password; // Mysql password
        
        try {
            // Connect to server and select database.
            $conn = mysqli_connect($host, $username, $password, $db_name);
        } catch (\Exception $e) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    public function closeConnection() {
        mysqli_close($conn);
    }
}