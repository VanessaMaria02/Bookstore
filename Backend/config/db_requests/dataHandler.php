<?php
include("product.php");
include("user.php");
include("person.php");
include("password.php");
include("bestellungen.php");
class DataHandler{

    

    private function sqlResultToArray($sqlResult)
        {
            if($sqlResult === null)
            {
                return null;
            }
            if(is_string($sqlResult))
            {
                return $sqlResult;
            }
            $resultArray = array();
            foreach ($sqlResult as $key => $value) 
            {
                $resultArray[$key] = $value; 
            }
            return $resultArray;
        }

    public function getAllProducts(){
        require("db_getAllProducts.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new Product(
                $line["pr_id"],
                $line["pr_title"],
                $line["pr_bild"],
                $line["pr_preis"]
            ));
        }
        return $result;
    }
    

    public function getIDBestellungen($param){
        require("db_getIDBestellungen.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new Bestellung(
                $line["b_id"],
                $line["u_id"],
                $line["pr_id"],
                $line["b_anzahl"],
                $line["b_timestamp"]
            ));
        }
        return $result;
    }

    public function getKatProducts($param){
        require("db_getKatProducts.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new Product(
                $line["pr_id"],
                $line["pr_title"],
                $line["pr_bild"],
                $line["pr_preis"]
            ));
        }
        return $result;
    }

    public function login($param){
        require("db_login.php");
            $result = array();
        foreach ($res as $line)
        {
            array_push($result, new User(
                $line["u_id"],
                $line["u_username"],
                $line["u_password"],
                $line["u_role"]
            ));
          
        }
        return $result;
        
        
    }
    

    public function getAllUser(){
        require("db_getAllUsers.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new User(
                $line["u_id"],
                $line["u_username"],
                $line["u_password"],
                $line["u_role"]
            ));
        }
        return $result;
    }

    public function AllUserName(){
        require("db_getAllUsersName.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new User(
                $line["u_id"],
                $line["u_username"],
                $line["u_password"],
                $line["u_role"]
            ));
        }
        return $result;
    }

    public function hashPassword($param){
        require("db_hashPassword.php");
        $result = array();
        array_push($result, new Password(
            $res));
        return $result;
    }

    public function  getTitleProducts($param){
        require("db_getTitleProducts.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new Product(
                $line["pr_id"],
                $line["pr_title"],
                $line["pr_bild"],
                $line["pr_preis"]
            ));
        }
        return $result;
    }

    public function  getIDProduct($param){
        require("db_getIDProducts.php");
        $result = array();
        foreach ($res as $line)
        {
            array_push($result, new Product(
                $line["pr_id"],
                $line["pr_title"],
                $line["pr_bild"],
                $line["pr_preis"]
            ));
        }
        return $result;
    }

    public function  saveUser($param){
        require("db_saveUser.php");
        //$result = array();
        //foreach ($res as $line)
        //{
           // array_push($result, new Person(
               // $line["anrede"],
                //$line["vname"],
                //$line["nname"],
                //$line["adresse"],
                //$line["plz"],
                //$line["ort"],
                //$line["email"],
                //$line["uname"]
           //));
        //}
        //$result = $res;
        $result = $this->sqlResultToArray($res);
        return $result;
        }
}