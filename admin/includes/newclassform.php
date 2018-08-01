<?php
class NewClassForm {
    public function createClass($lvl, $day, $shift, $year, $active) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Create new class
        if($db) {
            $sql = "INSERT INTO turma (nivel, dia, turno, ano_inicio, turma_ativa) VALUES ('$lvl', '$day', '$shift', '$year', '$active')";
            $result = mysqli_query($db, $sql);
        }

        //Determines returned value ('true' or error code)
        if ($err == '') {
            $success = 'true';
        } else {
            $success = $err;
        };

        return $success;
    }
}
