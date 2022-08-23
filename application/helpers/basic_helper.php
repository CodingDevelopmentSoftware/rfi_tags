<?php
function checkUserSession()
{
    $CI = &get_instance();
    return $CI->session->userdata();
}

function getUserType()
{
    $userType = checkUserSession();
    return $userType['type'];
}

function postAllowed()
{
    $CI = &get_instance();
    if (count($CI->input->post()) <= 0 && $_SERVER['REQUEST_METHOD'] != 'POST' ) {
        return false;
    }
    return true;
}

function postDataFilterhtml($data)
{
    $CI = &get_instance();
    $data = trim($data);
    $data = htmlentities($data);
    $data = mysqli_real_escape_string($CI->db->conn_id, $data);
    return $data;
}
