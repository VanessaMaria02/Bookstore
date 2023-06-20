<?php
if(true){
    require_once('dbacess.php');

    $sql = "SELECT * FROM kategorien";
    $res = $db->query($sql);
    $db->close();
} 