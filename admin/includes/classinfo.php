<?php
class ClassInfo {
    public function getInfo($onlyactives) {
        // Create connection to database
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Get info
        if($db) {
            $sql;
            if($onlyactives) {
                $sql = "SELECT * FROM turma t WHERE t.turma_ativa = 1 ORDER BY t.nivel, t.ano_inicio";
            } else {
                $sql = "SELECT * FROM turma t ORDER BY t.nivel, t.ano_inicio";
            }
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }

    public function getSingleClassInfo($idclass) {
        // Create connection to database
        try {
            $dbConn = new DbConn;
            $db = $dbConn->connectToDatabase();
            $err = '';

        } catch (\Exception $e) {
            $err = "Error: " . $e->getMessage();
        }

        // Get info
        if($db) {
            $sql = "SELECT t.nivel, t.dia, t.turno, t.ano_inicio, t.turma_ativa FROM turma t WHERE t.idTurma = '$idclass'";
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
}
