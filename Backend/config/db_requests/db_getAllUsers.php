<?php
if(true){
    require_once('dbacess.php');

    $sql = "SELECT * FROM user";
    $res = $db->query($sql);
    $db->close();
} 
?>