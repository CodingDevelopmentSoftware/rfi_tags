<?php
require './common-function.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== "POST") {
    $db->errorResponse(400, "Method should be post");
}

function reactBackend(DB $db)
{
    $data = $db->getJsonInput();
    if (empty($data)) {
        $db->errorResponse(400, 'Please send all paramters');
    }

    if (empty($data['data'])) {
        $db->errorResponse(400, 'data paramter is empty');
    }

    $responseStatus = [];
    foreach ($data['data'] as $value) {
        $status = 0;
        $check = $db->select("SELECT * FROM temp_excel WHERE rfid_or_id ='{$value['rfid_or_id']}'");
        if ($check) {
            $updateStr = "UPDATE temp_excel set status = 1 where project_id = {$value['id']} and rfid_or_id ='{$value['rfid_or_id']}'";
            $updateCheck = $db->update($updateStr);
            if ($updateCheck) {
                $status = 1;
                $value['message'] = 'updated successfully';
            } else {
                $value['message'] = 'not updated';
            }
        } else {
            $value['message'] = 'not found';
        }
        $value['status'] = $status;
        array_push($responseStatus, $value);
    }

    $db->successResponse(200, $responseStatus);
}


reactBackend($db);
