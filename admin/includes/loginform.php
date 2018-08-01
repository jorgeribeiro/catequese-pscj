<?php
class LoginForm {
    public function checkLogin($email, $password) {
        // Create connection to database
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Email and password check
        if($db) {
            $sql = "SELECT * FROM usuario WHERE email = '$email' and status = 1";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);

            // Checks password entered against db password hash
            if(password_verify($password, $row['senha'])) {
                $success = 'true';
                session_start();
                $iduser = $row['idUsuario'];
                $admin = $row['admin'];
                $_SESSION['iduser'] = $iduser;
                $_SESSION['email'] = $email;
                $_SESSION['admin'] = $admin;
            } else {
                // If not, shows an alert
                $success = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Email ou senha inválidos.</div>";
            }
        }
        
        return $success;
    }
}
