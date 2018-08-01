<?php
class NewUserForm {
    public function createUser($usr, $email, $pw, $adm, $classid) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Create new user
        if($db) {
            $sql = "SELECT * FROM usuario u WHERE u.email = '$email'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            $success = '';

            // Check if email is already in the database
            if($count == 0) {                
                // If not, insert into database
                $sql = "INSERT INTO usuario (nome, email, senha, admin, fk_idTurma) VALUES ('$usr', '$email', '$pw', '$adm', '$classid') ON DUPLICATE KEY UPDATE";
                $result = mysqli_query($db, $sql);

                //Determines returned value ('true' or error code)
                if ($err == '') {
                    $success = 'true';
                } else {
                    $success = $err;
                }

            }
        }

        return $success;
    }
}
