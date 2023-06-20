<?php
if(true){
    require_once('dbacess.php');

    $pr_id = $param["pr_id"];
    $r_id = $param["r_id"];
    $anzahl = $param["anzahl"];


    $sql = "SELECT * FROM rechnungen WHERE r_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("i", $r_id);
    $statment->execute();
    $zwischenRes = $statment->get_result();
    $statment->close();

    // Get values from the result of the first query
    $u_id = null;
    $b_timestamp = null;
    while ($row = $zwischenRes->fetch_assoc()) {
        $u_id = $row['u_id'];
        $b_timestamp = $row['b_timestamp'];
        // Assuming you only need the first row, you can break the loop here
        break;
    }

    $sql = "DELETE FROM bestellungen WHERE u_id = ? AND  b_timestamp = ? AND pr_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("isi", $u_id, $b_timestamp, $pr_id);
    $statment->execute();
    $statment->close();


    $sql = "SELECT * FROM bestellungen JOIN produkte ON bestellungen.pr_id = produkte.pr_id WHERE u_id = ? AND  b_timestamp = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("is",$u_id, $b_timestamp);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();
    $db->close();
}