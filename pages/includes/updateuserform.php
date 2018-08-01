<?php
class UpdateUserForm {
    public function updateUser($idusr, $usr, $email, $adm, $classid, $status) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Update user
        if($db) {
            $sql = "SELECT * FROM usuario u WHERE u.email = '$email'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            $success = '';

            // Check if email is already in the database
            if($count == 0) {                
                // If not, update into database
                $sql = "UPDATE usuario SET nome = '$usr', email = '$email', admin = '$adm', fk_idTurma = '$classid', status = '$status' WHERE idUsuario = '$idusr'";
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

    public function updateEmail($idusr, $email) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Update email
        if($db) {
            $sql = "SELECT * FROM usuario u WHERE u.email = '$email'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            $success = '';

            // Check if email is already in the database
            if($count == 0) {                
                // If not, update into database
                $sql = "UPDATE usuario SET email = '$email' WHERE idUsuario = '$idusr'";
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

    public function updatePassword($idusr, $oldpw, $newpw) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Update password
        if($db) {
            $sql = "SELECT * FROM usuario u WHERE u.idUsuario = '$idusr'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $success = '';

            // Checks password entered against db password hash
            if(password_verify($oldpw, $row['senha'])) {    
                $sql = "UPDATE usuario SET senha = '$newpw' WHERE idUsuario = '$idusr'";
                $result = mysqli_query($db, $sql);

                //Determines returned value ('true' or error code)
                if ($err == '') {
                    $success = 'true';
                } else {
                    $success = $err;
                }

            } else {
                $success = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Insira sua senha atual corretamente.</div>";
            }
        }

        return $success;
    }
}
