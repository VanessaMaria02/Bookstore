<?php
if(true){
    require_once('dbacess.php');

    $uname = $param['uname'];
    $timestamp = $param['timestamp'];
    $p_id = $param['p_id'];
    $anzahl = $param['anzahl'];

    //select u_ID
    $sql = "SELECT u_id FROM user WHERE u_username = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("s", $uname);
    $statment->execute();
    $zeile = $statment->get_result()->fetch_assoc();
    $statment->close();
    
    $sql = "INSERT INTO bestellungen (u_id, pr_id, b_anzahl, b_timestamp) VALUES (?,?,?,?)";
    $statment = $db->prepare($sql);
    $statment->bind_param("iiis", $zeile['u_id'], $p_id, $anzahl, $timestamp);
    $statment->execute();
    $statment->close();

    $sql = "SELECT * FROM bestellungen WHERE u_id = ? AND b_timestamp = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("is", $zeile['u_id'], $timestamp);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();

    $db->close();
}
?>
