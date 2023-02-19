<?php
require './common-function.php';
function reactBackend(DB $db)
{
    // Select Query
    $selectQuery = "SELECT pid as id, project_name as job_name FROM project_management WHERE status = 1 ORDER BY pid ASC";
    $db->select($selectQuery, true);
}


reactBackend($db);
