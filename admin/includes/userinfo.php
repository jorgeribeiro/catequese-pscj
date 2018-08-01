<?php
class UserInfo {
    public function getInfo($iduser) {
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
            $sql = "SELECT u.nome, u.email, u.fk_idTurma, u.admin, u.status, t.dia, t.nivel, t.turno, t.ano_inicio FROM usuario u INNER JOIN turma t ON t.idTurma = u.fk_idTurma WHERE u.idUsuario = '$iduser'";
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
}