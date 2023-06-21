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


    //countrollieren ob rechnung bereits vorhanden ist
    $sql = "SELECT COUNT(*) AS count FROM rechnungen WHERE u_id = ? AND b_timestamp = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("is", $zeile['u_id'], $timestamp);
    $statment->execute();
    $ergebnis = $statment->get_result()->fetch_assoc();

    if($ergebnis['count'] == 0) {

        $statment->close();
        $sql = "INSERT INTO rechnungen (u_id, b_timestamp) VALUES (?,?)";
        $statment = $db->prepare($sql);
        $statment->bind_param("is", $zeile['u_id'], $timestamp);
        $statment->execute();
        $statment->close();

        $sql = "SELECT * FROM rechnungen WHERE u_id = ? AND b_timestamp = ?";
        $statment = $db->prepare($sql);
        $statment->bind_param("is", $zeile['u_id'], $timestamp);
        $statment->execute();
        $res = $statment->get_result();
      
    } else {
        $res = $ergebnis;
        $statment->close();
    }
    

    $db->close();
}
?>