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
            default:
                $res = "NI";
                break;
        }
        return $res;
    }
}