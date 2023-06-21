<?php
if(true){
    require_once('dbacess.php');

    $u_id = $param['u_id'];
    $timestamp = $param['timestamp'];

    $sql = "SELECT * FROM rechnungen WHERE u_id = ? AND b_timestamp = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("is", $u_id, $timestamp);
    $statment->execute();
    $ergebnis = $statment->get_result();

    if($ergebnis->rowCount()!=0) {
        $res = $ergebnis;
        $statment->close();
    } else {
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
    }
    

    $db->close();
}
?>
