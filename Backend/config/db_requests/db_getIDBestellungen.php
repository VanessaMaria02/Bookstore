<?php
if(true){
    require_once('dbacess.php');

    $sql = "SELECT * FROM rechnungen WHERE u_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("i", $param);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();
    $db->close();
}