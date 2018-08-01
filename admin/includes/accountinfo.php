<?php
class AccountInfo {
    public function getInfo() {
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
            $sql = "SELECT u.idUsuario, u.nome, u.email, u.admin, u.status, t.nivel, t.dia, t.turno, t.ano_inicio FROM usuario u INNER JOIN turma t ON t.idTurma = u.fk_idTurma ORDER BY u.nome";
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
}
?>