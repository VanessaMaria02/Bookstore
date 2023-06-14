<?php
include("logic/requestHandler.php");

$param = "";
$method ="";

isset($_GET["method"]) ? $method = $_GET["method"] : false;
isset($_GET["param"]) ? $param = $_GET["param"] : false;

isset($_POST["method"]) ? $method = $_POST["method"] : false;
isset($_POST["param"]) ? $param = $_POST["param"] : false;

$logic = new Logic();
$result = $logic->handleRequest($method, $param);

if ($result === null)
{
    response("GET", 400, null);
}
else if (is_string($result))
{
    if($result === "NI")
    {
        response("GET", 501, "Not implemented yet!");
    }
    else
    {
        response("GET", 500, $result);
    }
}
else
{
    response("GET", 200, $result);
}

function response($method, $httpStatus, $param)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "GET":
            http_response_code($httpStatus);
            echo (json_encode($param));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}