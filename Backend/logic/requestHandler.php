<?php
include("./config/db_requests/dataHandler.php");

class Logic{
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();
    }

    function handleRequest($method, $param)
    {
        switch ($method) {
            case "getAllProducts":
                $res = $this->dh->getAllProducts();
                break;
            case "getAllProductsVW":
                $res = $this->dh->getAllProductsVW();
                break;
            case "queryBookTitle":
                $res = $this->dh->getTitleProducts($param);
                break;
            case "getKatProducts":
                $res = $this->dh->getKatProducts($param);
                break;
            case "getProductbyID":
                $res = $this->dh->getIDProduct($param);
                break;
            case "getIDProductVW":
                $res = $this->dh->getIDProductVW($param);
                break;
            case "login":
                $res = $this->dh->login($param);
                break;
            case "saveUser":
                $res = $this->dh->saveUser($param);
                break;
            case "hashPassword":
                $res = $this->dh->hashPassword($param);
                break;
            case "getAllUser":
                $res = $this->dh->getAllUser($param);
                break;
            case "AllUserName":
                $res = $this->dh->AllUserName($param);
                break;
            case "getIDBestellungen":
                $res = $this->dh->getIDBestellungen($param);
                break;
            case "getIDBestellungundProdukt":
                $res = $this->dh->getIDBestellungundProdukt($param);
                break;
            case "getIDUserPerson":
                $res = $this->dh->getIDUserPerson($param);
                break;
            case "UpdateUser":
                $res = $this->dh->UpdateUser($param);
                break;
<<<<<<< HEAD
            case "updateUser": // New case to handle updateUser method
                    $res = $this->dh->updateUser($param);
                break;
=======
            case "editProduktBestellung":
                $res = $this->dh->editProduktBestellung($param);
                break;
            case "deletProduktBestellung":
                $res = $this->dh->deletProduktBestellung($param);
                break;
            case "getAllCategories":
                $res = $this->dh->getAllCategories($param);
                break;
            case "creatProduct":
                $res = $this->dh->creatProduct($param);
                break;
            case "updateProduct":
                $res = $this->dh->updateProduct($param);
                break; 
>>>>>>> a719bdb45b7391e1458fb7f4ae2b48fdd9ff4d17
            default:
                $res = "NI";
                break;
        
        }
        return $res;
    } 
}