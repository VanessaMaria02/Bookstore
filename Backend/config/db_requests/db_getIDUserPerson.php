<?php
if(true){
    require_once('dbacess.php');

    $sql = "SELECT * FROM user JOIN personen ON user.u_id = personen.u_id WHERE user.u_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("i", $param);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();
    $db->close();
}