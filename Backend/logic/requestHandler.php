<?php
include("config/dataHandler.php");

class Logic{
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();
    }

    function handleRequest($method, $param)
    {
        switch ($method) {
            case "getAllBooks":
                $res = $this->dh->getAllBooks();
                break;
            default:
                $res = "NI";
                break;
        }
        return $res;
    }
}