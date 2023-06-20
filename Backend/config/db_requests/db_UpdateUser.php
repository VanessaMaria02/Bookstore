<?php
if(true){
    require_once('dbacess.php');

    $u_id = $param['id'];
    $uname = $param['uname'];
    $anrede = $param['anrede'];
    $vorname = $param['vorname'];
    $nachname = $param['nachname'];
    $adresse = $param['adresse'];
    $plz = $param['plz'];
    $ort = $param['ort'];
    $email = $param['email'];
    $urole = $param['urole'];
    $password = $param['password'];


     //Daten mit php überprüfen 
    if(empty($uname) || empty($u_id) || empty($anrede) || empty($vorname) || empty($nachname) || empty($email)  || empty($password)  || empty($adresse) || empty($plz) || empty($ort) ){
        exit();
    }


    if(!preg_match("/^[a-zA-Z]+$/",$vorname)){
        exit();
    }

    if(!preg_match("/^[a-zA-Z]+$/",$nachname)){
        exit();
    }

    if(!preg_match("/^[a-zA-Z]+$/",$ort)){
       exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        exit();
    }

    if(strlen($uname) > 40 || !preg_match("/^[a-zA-Z0-9]+$/", $uname)){
        exit();
    }



    if($password != "pwd" && strlen($password) < 8){
        exit();
    }


    if (!is_numeric($plz)) {
        exit();
    }

    //Daten in Datenbank übertragen
    //Password hashen funktioniert nicht -> sobald passwort gehashed wird bekommt man keine response vom Ajax call??
    //$Passwort = password_hash($password, PASSWORD_DEFAULT);
    //$Passwort = $password;

   


    if($password === "pwd"){
        $sql = "UPDATE personen JOIN user ON personen.u_id = user.u_id SET p_vorname = ?, p_nachname = ?, p_anrede = ?, p_adresse = ?, p_plz = ?, p_ort = ? , p_email = ?, u_username = ?, u_role = ? WHERE user.u_id = ?";
        $statment = $db->prepare($sql);
        $statment->bind_param("ssssisssii", $vorname, $nachname, $anrede, $adresse, $plz, $ort, $email, $uname, $urole, $u_id);
    }else{
        $sql = "UPDATE personen JOIN user ON personen.u_id = user.u_id SET p_vorname = ?, p_nachname = ?, p_anrede = ?, p_adresse = ?, p_plz = ?, p_ort = ? , p_email = ?, u_username = ?, u_role = ?, u_password = ? WHERE user.u_id = ?";
        $statment = $db->prepare($sql);
        $statment->bind_param("ssssisssisi", $vorname, $nachname, $anrede, $adresse, $plz, $ort, $email, $uname, $urole, $password, $u_id);
    }

    //Kontrollieren ob statments erfolgreich ausgeführt werde
    if($statment->execute()){

    }else{
        exit();
    }

    $statment->close();

   

    $sql = "SELECT * FROM user JOIN personen ON user.u_id = personen.u_id WHERE user.u_id = ?";
    $statment = $db->prepare($sql);
    $statment->bind_param("i", $u_id);
    $statment->execute();
    $res = $statment->get_result();
    $statment->close();
    $db->close();
}
?>