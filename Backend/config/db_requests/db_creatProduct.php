<?php
if(true){
    require_once('dbacess.php');

    $kategorieID = $param['kategorieID'];
    $titel = $param['titel'];
    $bildername = $param['bild'];
    $beschreibung = $param['beschreibung'];
    $autor = $param['autor'];
    $preis = $param['preis'];

    $sql = "INSERT INTO produkte(k_id, pr_title, pr_bild, pr_preis, pr_beschreibung, pr_autor) VALUES (?, ?, ?, ?, ?, ?)";
    if (!$stmt = $db->prepare($sql))
    {
        exit();
    }
    $stmt->bind_param("issdss",$kategorieID, $titel, $bildername, $preis, $beschreibung, $autor);
    
    $stmt->execute();
    $stmt->close();

    $sql = "SELECT * FROM produkte";
    $res = $db->query($sql);
    $db->close();
}
?>