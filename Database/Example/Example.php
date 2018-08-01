<?php

$link = Database::connectToDatabase();
if ($link) {
    $modelsList = array();
    $sql = "SELECT * FROM `modelo`";
    $data = Database::executeSQL($sql, $link);
    if($data){
        while ($row = mysql_fetch_assoc($data)) {
            array_push($modelsList, $row['identifier']);
        }
    }
    print_r($modelsList)
}
   