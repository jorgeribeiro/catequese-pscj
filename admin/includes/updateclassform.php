<?php
class UpdateClassForm {
    public function updateClass($idcls, $lvl, $day, $shift, $year, $active) {
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Update class
        if($db) {            
            $sql = "UPDATE turma SET nivel = '$lvl', dia = '$day', turno = '$shift', ano_inicio = '$year', turma_ativa = '$active' WHERE idTurma = '$idcls'";
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
