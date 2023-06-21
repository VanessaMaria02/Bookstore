// sql code für die Datenbank

<?php
if(true){
    require_once('dbacess.php');

    $ID = $param['ID'];
    $kategorieID = $param['kategorieID'];
    $titel = $param['titel'];
    $beschreibung = $param['beschreibung'];
    $autor = $param['autor'];
    $preis = $param['preis'];

    $sql = "UPDATE produkte SET k_id = ?, pr_title = ?, pr_preis = ?, pr_beschreibung = ?, pr_autor = ? WHERE pr_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("isdssi", $kategorieID, $titel, $preis, $beschreibung, $autor, $ID);
    $statment->execute();
    $statment->close();

    $sql = "SELECT * FROM produkte WHERE pr_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("i", $param);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();

    $db->close();
}
?>