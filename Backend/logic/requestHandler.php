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
            case "queryBookTitle":
                $res = $this->dh->getTitleProducts($param);
                break;
            case "getKatProducts":
                $res = $this->dh->getKatProducts($param);
                break;
            case "getProductbyID":
                $res = $this->dh->getIDProduct($param);
                break;
            case "login":
                $res = $this->dh->login($param);
                break;
            case "saveUser":
                $res = $this->dh->saveUser($param);
                break;
            default:
                $res = "NI";
                break;
        }
        return $res;
    }
}