<?php
if(true){
    require_once('dbacess.php');

    $anrede = $param['anrede'];
    $vname = $param['vname'];
    $nname = $param['nname'];
    $adresse = $param['adresse'];
    $plz = $param['plz'];
    $ort = $param['ort'];
    $email = $param['email'];
    $uname = $param['uname'];
    $password = $param['password'];
    $password2 = $param['password2'];

     //Daten mit php überprüfen 
    if(empty($anrede) || empty($vname) || empty($nname) || empty($email) || empty($uname) || empty($password) || empty($password2) || empty($adresse) || empty($plz) || empty($ort) ){
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        exit();
    }

    if(strlen($uname) > 40 || !preg_match("/^[a-zA-Z0-9]+$/", $uname)){
        exit();
    }

    if(strlen($password) < 8){
        exit();
    }

    if($password!=$password2){
        exit();
    }

    if (!is_numeric($plz)) {
        exit();
    }

    //Daten in Datenbank übertragen
    //Password hashen funktioniert nicht -> sobald passwort gehashed wird bekommt man keine response vom Ajax call??
    //$Passwort = password_hash($password, PASSWORD_DEFAULT);
    $Passwort = $password;
    $role = 0;

    //Controllieren ob Username bereits verwendet wird
    $sql ="SELECT COUNT(*) AS count FROM user 
    WHERE u_username = '$uname'";
    $db_erg = mysqli_query( $db, $sql);
    $zeile = mysqli_fetch_array($db_erg, MYSQLI_ASSOC);
    if($zeile['count'] > 0){
        exit();
    }

    //Daten in Tabelle user einfügen
    $sql = "INSERT INTO user(u_username, u_password, u_role) VALUES (?, ?, ?)";
    if (!$stmt = $db->prepare($sql))
    {
        exit();
    }
    $stmt->bind_param("ssi",$uname, $Passwort, $role);
    
    $stmt->execute();
    $stmt->close();

    //select u_ID
    $sql = "SELECT u_id FROM user WHERE u_username = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("s", $uname);
    $statment->execute();
    $zeile = $statment->get_result()->fetch_assoc();
    $statment->close();

    //Daten in Tabelle personen einfügen
    $sql = "INSERT INTO personen(u_id, p_vorname, p_nachname, p_anrede, p_adresse, p_plz, p_ort, p_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    if (!$stmt = $db->prepare($sql))
    {
        exit();
    }
    $stmt->bind_param("issssiss",$zeile['u_id'], $vname, $nname, $anrede, $adresse, $plz, $ort, $email);

    
   
    
    if($stmt->execute()){
        $stmt->close();
        $sql = "SELECT * FROM user JOIN personen ON user.u_id = personen.u_id WHERE user.u_id = ?";
        $state = $db->prepare($sql);
        $state->bind_param("i", $zeile['u_id']);
        $state->execute();
        $res = $state->get_result();
        $state->close();
        $db->close();
    }
  
   
}
?>